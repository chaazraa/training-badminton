<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Coach;
use App\Models\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    // Tampilkan semua jadwal
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedule.index', compact('schedules'));
    }

    // Form tambah jadwal
    public function create()
    {
        $coaches = Coach::all();
        $users = User::all();
        return view('schedule.create', compact('coaches', 'users'));
    }

    // Simpan jadwal baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'user_id' => 'required|string',  // Ganti id_user menjadi user_id
            'coach_id' => 'required|string', // Ganti id_pelatih menjadi coach_id
            'lokasi' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        // Simpan data jadwal baru
        Schedule::create($validatedData);

        return redirect()->route('schedules.index')
                         ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    // Tampilkan detail jadwal
    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('schedule.show', compact('schedule'));
    }

    // Form edit jadwal
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('schedule.edit', compact('schedule'));
    }

    // Perbarui jadwal
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'user_id' => 'required|string',  // Ganti id_user menjadi user_id
            'coach_id' => 'required|string', // Ganti id_pelatih menjadi coach_id
            'lokasi' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->tanggal = $validatedData['tanggal'];
        $schedule->waktu_mulai = $validatedData['waktu_mulai'];
        $schedule->waktu_selesai = $validatedData['waktu_selesai'];
        $schedule->user_id = $validatedData['user_id'];  // Ganti id_peserta menjadi user_id
        $schedule->coach_id = $validatedData['coach_id']; // Ganti id_pelatih menjadi coach_id
        $schedule->lokasi = $validatedData['lokasi'];
        $schedule->keterangan = $validatedData['keterangan'];
        $schedule->save();

        return redirect()->route('schedules.index')
                         ->with('success', 'Jadwal berhasil diperbarui.');
    }

    // Hapus jadwal
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedules.index')
                         ->with('success', 'Jadwal berhasil dihapus.');
    }
}
