<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        // Ambil semua pelatihan
        $trainings = Training::paginate(10);

        // Tampilkan view dengan data pelatihan
        return view('trainings.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('trainings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainingRequest $request): RedirectResponse
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('Please login to create a training.');
        }

        // Buat pelatihan tanpa gambar
        Training::create([
            'date'       => $request->date,
            'time'       => $request->time,
            'participant'=> $request->participant,
            'instructor' => $request->instructor,
            'duration'   => $request->duration,
            'notes'      => $request->notes
        ]);

        // Redirect ke halaman index
        return redirect()->route('trainings.index')->with(['success' => 'Training successfully saved!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) : View
    {
        // Ambil data pelatihan berdasarkan ID
        $training = Training::findOrFail($id);

        // Tampilkan view dengan data pelatihan
        return view('trainings.show', compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : View
    {
        $training = Training::findOrFail($id);

        return view('trainings.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingRequest $request, string $id) : RedirectResponse
    {
        // Ambil data pelatihan berdasarkan ID
        $training = Training::findOrFail($id);

        // Update data pelatihan tanpa gambar
        $training->update([
            'date'       => $request->date,
            'time'       => $request->time,
            'participant'=> $request->participant,
            'instructor' => $request->instructor,
            'duration'   => $request->duration,
            'notes'      => $request->notes
        ]);

        // Redirect ke halaman index
        return redirect()->route('trainings.index')->with(['success' => 'Training successfully updated!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : RedirectResponse
    {
        $training = Training::findOrFail($id);

        // Hapus pelatihan
        $training->delete();

        // Redirect ke halaman index
        return redirect()->route('trainings.index')->with(['success' => 'Training successfully deleted!']);
    }
}
