<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    // Menampilkan semua peserta
    public function index()
    {
        $participants = Participant::all();
        return response()->json($participants);
    }

    // Menyimpan peserta baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|string',
            'name' => 'required|string',
            'age' => 'required|integer|min:1',
            'gender' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|email|unique:participans,email',
            'address' => 'required|string',
            'date' => 'required|date',
            'coach' => 'required|string',
            'time' => 'required|date_format:H:i',
        ]);

        $participant = Participant::create($validatedData);
        return response()->json(['message' => 'Data peserta berhasil disimpan.', 'participan' => $participan]);
    }

    // Menampilkan peserta berdasarkan ID
    public function show($id)
    {
        $participant = Participant::find($id);

        if (!$participant) {
            return response()->json(['message' => 'Peserta tidak ditemukan'], 404);
        }

        return response()->json($participant);
    }

    // Memperbarui peserta berdasarkan ID
    public function update(Request $request, $id)
    {
        $participant = Participant::find($id);

        if (!$participant) {
            return response()->json(['message' => 'Peserta tidak ditemukan'], 404);
        }

        $validatedData = $request->validate([
            'image' => 'nullable|string',
            'name' => 'nullable|string',
            'age' => 'nullable|integer|min:1',
            'gender' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|string|email|unique:participans,email,' . $id,
            'address' => 'nullable|string',
            'date' => 'nullable|date',
            'coach' => 'nullable|string',
            'time' => 'nullable|date_format:H:i',
        ]);

        $participant->update($validatedData);
        return response()->json(['message' => 'Data peserta berhasil diperbarui.', 'participan' => $participan]);
    }

    // Menghapus peserta berdasarkan ID
    public function destroy($id)
    {
        $participant = Participant::find($id);

        if (!$participant) {
            return response()->json(['message' => 'Peserta tidak ditemukan'], 404);
        }

        $participant->delete();
        return response()->json(['message' => 'Data peserta berhasil dihapus.']);
    }
}
