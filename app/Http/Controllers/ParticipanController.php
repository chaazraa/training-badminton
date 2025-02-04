<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Training;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::with('user', 'training')->get();
        return view('participants.index', compact('participants'));
    }

    public function register($trainingId)
    {
        $training = Training::findOrFail($trainingId);
        return view('participants.register', compact('training'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'training_id' => 'required',
        ]);

        Participant::create($request->all());
        return redirect()->route('participants.index')->with('success', 'Registration successful!');
    }
}
