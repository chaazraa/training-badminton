<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    // Menampilkan form pendaftaran peserta
    public function create()
    {
        return view('participant.create');
    }

    // Menyimpan data peserta yang telah mendaftar
    public function store(Request $request)
    {
        // Validasi data peserta
        $request->validate([
            'name' => 'required|string|max:255',
            'id_peserta' => 'required|numeric',
            'jadwal' => 'required|date_format:Y-m-d H:i:s',
        ]);

        // Menyimpan data peserta ke database
        Participant::create([
            'name' => $request->name,
            'id_peserta' => $request->id_peserta,
            'jadwal' => $request->jadwal,
        ]);

        // Redirect ke halaman daftar peserta dengan pesan sukses
        return redirect()->route('participant.index')->with('success', 'Pendaftaran berhasil!');
    }

    // Menampilkan daftar peserta yang telah terdaftar
    public function index()
    {
        $participants = Participant::all(); // Ambil semua data peserta
        return view('participant.index', compact('participants'));
    }
}
