<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email',
            'phone' => 'required|numeric',
            'age' => 'required|integer|min:10|max:50'
        ]);

        Participant::create($request->all());

        return redirect()->back()->with('success', 'Pendaftaran berhasil!');
    }
}
