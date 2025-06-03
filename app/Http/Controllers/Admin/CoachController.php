<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreCoachRequest;
use App\Http\Requests\UpdateCoachRequest;
use App\Models\Coach;
use App\Models\User;

class CoachController extends Controller
{
    // Menampilkan daftar coach
    public function index(): View
    {
        $coaches = Coach::all(); // Ambil semua data coach
        return view('admin.coaches.index', compact('coaches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.coaches.create');
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
    // Coach::create([
    //     'coach_id'     => $request->input('coach_id'),
    //     'name'          => $validatedData['name'],
    //     'photo'         => $validatedData['photo'] ?? null,
    //     'birth_date'    => $validatedData['birth_date'],
    //     'birth_place'   => $validatedData['birth_place'],
    //     'phone'         => $validatedData['phone'],
    //     'email'         => $validatedData['email'],
    //     'address'       => $validatedData['address'],
    //     'experience'    => $validatedData['experience'],
    // ]);


    return redirect()->route('admin.coaches.index')->with('success', 'Coach created successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(Coach $coach): View
    {
        return view('admin.coaches.show', compact('coach'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coach $coach): View
    {
        return view('admin.coaches.edit', compact('coach'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoachRequest $request, Coach $coach): RedirectResponse
    {
        $validatedData = $request->validated();
        
        // Handle photo removal
        if ($request->has('remove_photo') && $request->remove_photo) {
            if ($coach->photo && Storage::exists($coach->photo)) {
                Storage::delete($coach->photo);
            }
            $validatedData['photo'] = null;
        }
        // Handle photo upload
        elseif ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($coach->photo && Storage::exists($coach->photo)) {
                Storage::delete($coach->photo);
            }
            $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $coach->update($validatedData);
        return redirect()->route('admin.coaches.index')->with('success', 'Coach updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coach $coach): RedirectResponse
    {
        // Hapus foto jika ada
        if ($coach->photo && Storage::exists($coach->photo)) {
            Storage::delete($coach->photo);
        }
        
        $coach->delete();
        return redirect()->route('admin.coaches.index')->with('success', 'Coach deleted successfully!');
    }
}
