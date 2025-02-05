<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreCoachRequest;
use App\Http\Requests\UpdateCoachRequest;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $coaches = Coach::all();
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
            'image'    => 'required|string',
            'name'     => 'required|string',
            'phone'    => 'required|string',
            'email'    => 'required|string|email|unique:coaches,email',
            'address'  => 'required|string',
            'date'     => 'required|date',
            'time'     => 'required|date_format:H:i',
     ]);
     
        $coach = Coach::create($validatedData);
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
