<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ScheduleController extends Controller
{
    // Menampilkan semua jadwal
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedule.index', compact('schedules'));
    }

    // Menampilkan form untuk membuat jadwal baru
    public function create()
    {
        return view('schedule.create');
    }

    // Menyimpan jadwal baru
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'coach_id' => 'required|exists:coaches,id',
            'participant_id' => 'required|exists:participants,id',
            'duration' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        Schedule::create($validatedData);
        return redirect()->route('schedule.index')->with('success', 'Jadwal berhasil dibuat!');
    }

    // Menampilkan jadwal berdasarkan ID
    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('schedule.show', compact('schedule'));
    }

    // Menampilkan form untuk mengedit jadwal
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('schedule.edit', compact('schedule'));
    }

    // Memperbarui jadwal berdasarkan ID
    public function update(Request $request, $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'coach_id' => 'required|exists:coaches,id',
            'participant_id' => 'required|exists:participants,id',
            'duration' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->update($validatedData);
        return redirect()->route('schedule.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    // Menghapus jadwal berdasarkan ID
    public function destroy($id): RedirectResponse
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->route('schedule.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}