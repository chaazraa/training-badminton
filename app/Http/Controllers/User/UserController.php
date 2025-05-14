<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua data user
        return view('users.index', compact('users')); // Menampilkan data user di view
    }

    public function create()
    {
        return view('users.create'); // Menampilkan form untuk membuat user
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'string|in:user,admin',
            'gender' => 'string|in:Laki-laki,Perempuan',
            'birth_date' => 'date|nullable',
            'birth_place' => 'string|nullable',
            'experience' => 'string|nullable',
            'address' => 'string|nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Simpan ke storage
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role ?? 'user',
            'gender' => $request->gender ?? 'Laki-laki',
            'birth_date' => $request->birth_date,
            'birth_place' => $request->birth_place,
            'experience' => $request->experience,
            'address' => $request->address,
            'image' => $imagePath, // Simpan path gambar ke database
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
            'gender' => 'string|in:Laki-laki,Perempuan',
            'birth_date' => 'date|nullable',
            'birth_place' => 'string|nullable',
            'experience' => 'string|nullable',
            'address' => 'string|nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Update data pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->gender = $request->gender;
        $user->birth_date = $request->birth_date;
        $user->birth_place = $request->birth_place;
        $user->experience = $request->experience;
        $user->address = $request->address;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            // Simpan gambar baru
            $user->image = $request->file('image')->store('images', 'public');
        }

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('message', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Hapus gambar jika ada
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        return redirect()->route('users.index')->with('message', 'User deleted successfully!');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('login')->withErrors(['email' => 'Email atau password salah']);
        }

        return redirect()->route('dashboard')->with('message', 'Login berhasil');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('message', 'Logout berhasil');
    }
}
