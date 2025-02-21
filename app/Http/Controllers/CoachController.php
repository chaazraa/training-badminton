<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreCoachRequest;
use App\Http\Requests\UpdateCoachRequest;
use App\Models\Coach; 

class CoachController extends Controller
{

public function index(): View
{
    $coaches = Coach::all(); // Ambil data dari tabel "coaches"
    return view('coaches.index', compact('coaches'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('coaches.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
{
    $validatedData = $request->validate([
        'name'          => 'required|string|max:255',
        'photo'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'birth_date'    => 'nullable|date',
        'birth_place'   => 'nullable|string|max:255',
        'phone'         => 'nullable|string|max:15',
        'email'         => 'required|string|email|max:255|unique:coaches',
        'address'       => 'nullable|string',
        'experience'    => 'nullable|string|max:255',
    ]);

    if ($request->hasFile('photo')) {
        $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
    }

    Coach::create($validatedData);

    return redirect()->route('coaches.index')->with('success', 'Coach created successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(Coach $coach): View
    {
        return view('coaches.show', compact('coach'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coach $coach): View
    {
        return view('coaches.edit', compact('coach'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoachRequest $request, $coach): RedirectResponse
    {
        $coach->update($request->validated());
        return redirect()->route('coaches.index')->with('success', 'Coach updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($coach): RedirectResponse
    {
        $coach->delete();
        return redirect()->route('coaches.index')->with('success', 'Coach deleted successfully!');
    }
}
