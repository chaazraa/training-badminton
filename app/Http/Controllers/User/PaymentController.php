<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Menampilkan semua booking user beserta status pembayarannya.
     * Bisa digunakan untuk halaman "Status Pembayaran Saya".
     */
    public function index()
    {
        $bookings = Booking::with(['coach', 'schedule'])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.payments.index', compact('bookings'));
    }

    /**
     * Menampilkan detail status pembayaran dari satu booking.
     */
    public function show(Booking $booking)
    {
        // Pastikan booking milik user yang sedang login
        if ($booking->user_id !== auth()->id()) {
            return redirect()->route('user.payments.index')
                ->with('error', 'Anda tidak memiliki akses ke data ini.');
        }

        return view('user.payments.show', compact('booking'));
    }
}
