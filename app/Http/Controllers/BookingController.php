<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Coach;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon; // Pastikan Carbon sudah di-import

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'coach', 'schedule'])->latest()->get();
        return view('bookings.index', compact('bookings'));
    }

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

        return view('bookings.create', [
            'coaches' => Coach::all(),
            'schedules' => $schedules,
        ]);
    }

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
            'code' => 'BK-' . strtoupper(Str::random(6)),
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dibuat.');
    }

    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        return view('bookings.edit', [
            'booking' => $booking,
            'coaches' => Coach::all(),
            'schedules' => Schedule::all(),
        ]);
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'coach_id' => 'required|exists:coaches,id',
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        $booking->update([
            'coach_id' => $request->coach_id,
            'schedule_id' => $request->schedule_id,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil diperbarui.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dihapus.');
    }
}
