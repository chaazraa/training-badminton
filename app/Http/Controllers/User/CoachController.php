<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Coach;

class CoachController extends Controller
{
    // Menampilkan daftar coach
    public function index(): View
    {
        $coaches = Coach::all(); // Ambil semua data coach
        return view('user.coaches.index', compact('coaches'));
    }

    // Menyimpan coach baru
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $validatedData = $request->validate([
            'name'          => 'required|string|max:255',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi image
            'birth_date'    => 'nullable|date',
            'birth_place'   => 'nullable|string|max:255',
            'phone'         => 'nullable|string|max:15',
            'email'         => 'required|string|email|max:255|unique:coaches',
            'address'       => 'nullable|string',
            'experience'    => 'nullable|string|max:255',
        ]);

        // Proses upload foto jika ada
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
        }

        // Simpan data coach baru ke database
        Coach::create($validatedData);

        return redirect()->route('user.coaches.index')->with('success', 'Coach created successfully!');
    }

    // Menampilkan detail coach
    public function show(Coach $coach): View
    {
        return view('user.coaches.show', compact('coach'));
    }

    // Jika kamu tidak menggunakan create, edit, update, destroy, kamu bisa menghapus method tersebut atau biarkan kosong.
}
