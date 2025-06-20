<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Coach;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Midtrans\Config;
use Midtrans\Snap;
use GuzzleHttp\Client;

class BookingController extends Controller
{
    // Menampilkan daftar booking
    public function index()
    {
        // Ambil data booking terkait user yang sedang login, dengan relasi 'coach' dan 'schedule'
        $bookings = Booking::with(['coach', 'schedule'])
            ->where('user_id', auth()->id())  // Menampilkan booking hanya untuk user yang sedang login
            ->latest()
            ->get();

        return view('user.bookings.index', compact('bookings'));
    }

    // Menampilkan form untuk membuat booking baru
    public function create()
    {
        $schedules = Schedule::all();

        // Format tanggal jika ada
        $schedules = $schedules->map(function ($schedule) {
            if ($schedule->tanggal) {
                $schedule->formatted_date = Carbon::parse($schedule->tanggal)->format('l, d F Y - H:i');
            }
            return $schedule;
        });

        return view('user.bookings.create', [
            'coaches' => Coach::all(),
            'schedules' => $schedules,
        ]);
    }

    // Menyimpan booking baru
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'coach_id' => 'required|exists:coaches,id',
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        // Menyimpan booking baru dengan user_id dari user yang sedang login
        Booking::create([
            'user_id' => auth()->id(), // Otomatis mengambil user_id yang sedang login
            'coach_id' => $request->coach_id,
            'schedule_id' => $request->schedule_id,
            'payment_status' => 'pending', // Tambahkan status pembayaran default
        ]);

        return redirect()->route('user.bookings.payment')->with('success', 'Booking berhasil dibuat.');
    }

    // Menampilkan halaman pembayaran
    public function payment(Booking $booking)
    {
        // Periksa apakah booking ini milik user yang sedang login
        if ($booking->user_id !== auth()->id()) {
            return redirect()->route('user.bookings.index')
                ->with('error', 'Anda tidak memiliki akses ke booking ini.');
        }

        // Periksa status pembayaran
        if ($booking->payment_status !== 'pending') {
            return redirect()->route('user.bookings.index')
                ->with('error', 'Booking ini sudah tidak dalam status pending.');
        }

        // Set konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Buat snap token jika belum ada
        if (!$booking->snap_token) {
            $amount = $booking->schedule->price ?? config('booking.default_price', 50000);
            
            // Pastikan amount valid
            if ($amount <= 0) {
                return redirect()->route('user.bookings.show', $booking)
                    ->with('error', 'Harga tidak valid. Silahkan hubungi admin.');
            }

            // Siapkan data transaksi untuk Midtrans
            $transaction = [
                'transaction_details' => [
                    'order_id' => 'BOOK-' . $booking->id . '-' . time(),
                    'gross_amount' => (int)$amount,
                ],
                'customer_details' => [
                    'first_name' => auth()->user()->name,
                    'email' => auth()->user()->email,
                ],
                'item_details' => [
                    [
                        'id' => $booking->id,
                        'price' => (int)$amount,
                        'quantity' => 1,
                        'name' => 'Jadwal Latihan Badminton - ' . optional($booking->coach)->name,
                        'category' => 'Booking Pelatih Badminton'
                    ]
                ]
            ];

            try {
                // Buat permintaan ke Midtrans untuk mendapatkan Snap Token
                $client = new Client();
                $response = $client->post(
                    'https://app.' . (config('midtrans.is_production') ? '' : 'sandbox.') . 'midtrans.com/snap/v1/transactions',
                    [
                        'headers' => [
                            'Accept' => 'application/json',
                            'Content-Type' => 'application/json',
                            'Authorization' => 'Basic ' . base64_encode(config('midtrans.server_key') . ':'),
                        ],
                        'json' => $transaction,
                        'verify' => false // Hanya untuk development
                    ]
                );

                $snapToken = json_decode($response->getBody()->getContents())->token;
                
                // Simpan snap token
                $booking->update(['snap_token' => $snapToken]);
            } catch (\Exception $e) {
                return redirect()->route('user.bookings.show', $booking)
                    ->with('error', 'Terjadi kesalahan saat memproses pembayaran. Silakan coba lagi.');
            }
        }

        return view('user.bookings.payment', [
            'booking' => $booking,
            'snap_token' => $booking->snap_token
        ]);
    }

    // Callback untuk notifikasi dari Midtrans
    public function paymentCallback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed === $request->signature_key) {
            // Extract booking ID dari order_id (format: BOOK-{id}-{timestamp})
            $orderParts = explode('-', $request->order_id);
            $bookingId = $orderParts[1] ?? null;

            if (!$bookingId) {
                return response()->json(['message' => 'Invalid order ID format'], 400);
            }

            $booking = Booking::find($bookingId);

            if (!$booking) {
                return response()->json(['message' => 'Booking not found'], 404);
            }

            // Update status pembayaran berdasarkan status transaksi
            $transactionStatus = strtolower($request->transaction_status);
            
            // Mapping status Midtrans ke status aplikasi
            switch ($transactionStatus) {
                case 'capture':
                case 'settlement':
                    $paymentStatus = 'paid';
                    break;
                case 'deny':
                case 'expire':
                case 'cancel':
                    $paymentStatus = 'cancelled';
                    break;
                case 'pending':
                    $paymentStatus = 'pending';
                    break;
                default:
                    $paymentStatus = 'failed';
            }

            // Update status pembayaran
            $booking->update(['payment_status' => $paymentStatus]);

            return response()->json(['message' => 'Payment status updated successfully']);
        }

        return response()->json(['message' => 'Invalid signature'], 400);
    }

    // Memproses pembayaran yang berhasil
    public function paymentSuccess(Request $request, Booking $booking)
    {
        // Periksa apakah booking ini milik user yang sedang login
        if ($booking->user_id !== auth()->id()) {
            return redirect()->route('user.bookings.index')
                ->with('error', 'Anda tidak memiliki akses ke booking ini.');
        }

        // Update status pembayaran menjadi paid
        $booking->update(['payment_status' => 'paid']);

        return redirect()->route('user.bookings.show', $booking)
            ->with('success', 'Pembayaran berhasil! Booking Anda telah dikonfirmasi.');
    }

    // Memproses pembayaran yang gagal atau dibatalkan
    public function paymentFailed(Request $request, Booking $booking)
    {
        // Periksa apakah booking ini milik user yang sedang login
        if ($booking->user_id !== auth()->id()) {
            return redirect()->route('user.bookings.index')
                ->with('error', 'Anda tidak memiliki akses ke booking ini.');
        }

        // Update status pembayaran menjadi failed
        $booking->update(['payment_status' => 'failed']);

        return redirect()->route('user.bookings.show', $booking)
            ->with('error', 'Pembayaran gagal atau dibatalkan. Silakan coba lagi.');
    }

    // Menampilkan detail booking
    public function show(Booking $booking)
    {
        // Cek apakah booking tersebut milik user yang sedang login
        if ($booking->user_id !== auth()->id()) {
            return redirect()->route('user.bookings.index')->with('error', 'Anda tidak memiliki akses ke booking ini.');
        }

        return view('user.bookings.show', compact('booking'));
    }

    // Menampilkan form untuk edit booking
    public function edit(Booking $booking)
    {
        // Cek apakah booking tersebut milik user yang sedang login
        if ($booking->user_id !== auth()->id()) {
            return redirect()->route('user.bookings.index')->with('error', 'Anda tidak memiliki akses untuk mengedit booking ini.');
        }

        return view('user.bookings.edit', [
            'booking' => $booking,
            'coaches' => Coach::all(),
            'schedules' => Schedule::all(),
        ]);
    }

    // Memperbarui booking
    public function update(Request $request, Booking $booking)
    {
        // Validasi
        $request->validate([
            'coach_id' => 'required|exists:coaches,id',
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        // Cek apakah booking tersebut milik user yang sedang login
        if ($booking->user_id !== auth()->id()) {
            return redirect()->route('user.bookings.index')->with('error', 'Anda tidak memiliki akses untuk memperbarui booking ini.');
        }

        // Update data booking
        $booking->update([
            'coach_id' => $request->coach_id,
            'schedule_id' => $request->schedule_id,
        ]);

        return redirect()->route('user.bookings.index')->with('success', 'Booking berhasil diperbarui.');
    }

    // Menghapus booking
    public function destroy(Booking $booking)
    {
        // Cek apakah booking tersebut milik user yang sedang login
        if ($booking->user_id !== auth()->id()) {
            return redirect()->route('user.bookings.index')->with('error', 'Anda tidak memiliki akses untuk menghapus booking ini.');
        }

        // Hapus booking
        $booking->delete();

        return redirect()->route('user.bookings.index')->with('success', 'Booking berhasil dihapus.');
    }

    // Memperbarui status pembayaran
    public function updatePaymentStatus(Request $request, Booking $booking)
    {
        // Validasi
        $request->validate([
            'payment_status' => 'required|in:pending,paid,cancelled,failed',
        ]);

        // Cek apakah booking tersebut milik user yang sedang login
        if ($booking->user_id !== auth()->id()) {
            return redirect()->route('user.bookings.index')
                ->with('error', 'Anda tidak memiliki akses untuk memperbarui status pembayaran ini.');
        }

        // Update status pembayaran
        $booking->update([
            'payment_status' => $request->payment_status
        ]);

        return redirect()->route('user.bookings.index')
            ->with('success', 'Status pembayaran berhasil diperbarui.');
    }

    // Handle notification dari Midtrans
    public function handlePaymentNotification(Request $request)
    {
        $json = json_decode($request->getContent());
        
        $signatureKey = hash('sha512', $json->order_id . $json->status_code . $json->gross_amount . config('midtrans.server_key'));
        
        if ($signatureKey !== $json->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 400);
        }

        // Extract booking ID from order_id (format: BOOKING-{id}-{timestamp})
        $orderParts = explode('-', $json->order_id);
        $bookingId = $orderParts[1] ?? null;

        if (!$bookingId) {
            return response()->json(['message' => 'Invalid order ID format'], 400);
        }

        $booking = Booking::find($bookingId);

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        // Update payment status based on transaction status
        $transactionStatus = strtolower($json->transaction_status);
        
        switch ($transactionStatus) {
            case 'capture':
            case 'settlement':
                $paymentStatus = 'paid';
                break;
            case 'deny':
            case 'expire':
            case 'cancel':
                $paymentStatus = 'cancelled';
                break;
            case 'pending':
                $paymentStatus = 'pending';
                break;
            default:
                $paymentStatus = 'failed';
        }

        $booking->update([
            'payment_status' => $paymentStatus
        ]);

        return response()->json(['message' => 'Payment status updated successfully']);
    }
}