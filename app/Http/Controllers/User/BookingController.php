<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Coach;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Carbon\Carbon; // Pastikan Carbon sudah di-import

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
        ]);

        return redirect()->route('user.bookings.index')->with('success', 'Booking berhasil dibuat.');
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
}
