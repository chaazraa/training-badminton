<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
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
        return view('schedule.create');
    }

    // Simpan jadwal baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'id_peserta' => 'required|string',
            'id_pelatih' => 'required|string',
            'lokasi' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        Schedule::create($validatedData);

        return redirect()->route('schedules.index')
                         ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    // Tampilkan detail jadwal
    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('schedule.show', compact('schedule'));

        // Mengambil data jadwal berdasarkan ID
        $schedule = Schedule::findOrFail($id);

        // Mengirimkan data jadwal ke view
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
            'id_peserta' => 'required|string',
            'id_pelatih' => 'required|string|max:255',
            'lokasi' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->tanggal = $validatedData['tanggal'];
        $schedule->waktu_mulai = $validatedData['waktu_mulai'];
        $schedule->waktu_selesai = $validatedData['waktu_selesai'];
        $schedule->id_peserta = $validatedData['id_peserta'];
        $schedule->id_pelatih = $validatedData['id_pelatih'];
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
