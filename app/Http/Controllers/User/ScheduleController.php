<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ScheduleController extends Controller
{
    // Menampilkan semua jadwal
    public function index(): View
    {
        $schedules = Schedule::with('coach')->where('user_id', auth()->id())->get();
        return view('user.schedules.index', compact('schedules'));
    }

    // Menampilkan detail jadwal
    public function show($id): View
    {
        $schedule = Schedule::with('coach')->where('user_id', auth()->id())->findOrFail($id);
        return view('user.schedules.show', compact('schedule'));
    }

    // *Note*: Method create/store/edit/update/destroy biasanya tidak digunakan oleh user biasa.
    // Jika kamu ingin user hanya bisa melihat jadwalnya, cukup gunakan index dan show.
    // Namun jika kamu ingin user bisa request buat jadwal sendiri, kamu bisa aktifkan ini:

    /*
    public function create(): View
    {
        $coaches = Coach::all();
        return view('user.schedules.create', compact('coaches'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'coach_id' => 'required|exists:coaches,id',
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $validatedData['user_id'] = auth()->id(); // Set user ID otomatis

        Schedule::create($validatedData);

        return redirect()->route('user.schedules.index')
                         ->with('success', 'Jadwal berhasil dibuat.');
    }
    */

    // Jika tidak digunakan, biarkan method create/store dalam komentar
}
