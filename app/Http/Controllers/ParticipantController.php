<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::all();
        return view('participants.index', compact('participants'));
    }

    public function create()
    {
        $coaches = Coach::all(); // Ambil semua coach
        return view('participants.create', compact('coaches'));
    }


    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|unique:participants',
        'gender' => 'required|string',
        'address' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Simpan gambar jika diupload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('participants', 'public');
    } else {
        $imagePath = null;
    }

    // Simpan ke database
    Participant::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'gender' => $request->gender,
        'address' => $request->address,
        'image' => $imagePath,
    ]);

    return redirect()->route('participants.index')->with('success', 'Registration successful!');
}

    public function edit($id)
    {
        $participant = Participant::findOrFail($id);
        return view('participants.edit', compact('participant'));
    }

    public function show($id)
    {
        $participant = Participant::findOrFail($id);
        return view('participants.show', compact('participant'));
    }

    public function update(Request $request, $id)
    {
        $participant = Participant::findOrFail($id);

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:participants,email,'.$id,
            'gender' => 'required|in:male,female',
            'address' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $participant->image = $imagePath;
        }

        $participant->update($request->except('image'));
        return redirect()->route('participants.index')->with('success', 'Participant updated successfully');
    }

    public function destroy($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();
        return redirect()->route('participants.index')->with('success', 'Participant deleted successfully');
    }
    
}
