<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/home', function () {
    return view('home');
});


// // Dashboard User
// Route::middleware(['auth', ])->group(function () {
//     Route::get('/dashboard', [ParticipantController::class, 'index'])->name('dashboard');
// });

// Dashboard Admin
Route::middleware(['auth', 'admin'])->group(function () {
     Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::get('/users', function() {
    $users = User::all();
    return view('users.index', compact('users'));
});

// Rute untuk ScheduleController
Route::resource('schedules', ScheduleController::class);
// Rute untuk ParticipantController
Route::resource('participants', ParticipantController::class);
// Rute untuk UserController
Route::resource('users', UserController::class);
// Rute untuk CoachController
Route::resource('coaches', CoachController::class);

// Route::get('/coaches', [CoachController::class, 'index'])->name('coaches.index');
// Route::get('/coaches/create', [CoachController::class, 'create'])->name('coaches.create');
// Route::post('/coaches', [CoachController::class, 'store'])->name('coaches.store');
// Route::get('/coaches/{id}/edit', [CoachController::class, 'edit'])->name('coaches.edit');
// Route::put('/coaches/{id}', [CoachController::class, 'update'])->name('coaches.update');
// Route::delete('/coaches/{id}', [CoachController::class, 'destroy'])->name('coaches.destroy');
// Route::get('/coaches/{id}', [CoachController::class, 'show'])->name('coaches.show');


// Route::get('/participants', [ParticipantController::class, 'index'])->name('participants.index');
// Route::get('/participants/create', [ParticipantController::class, 'create'])->name('participants.create');
// Route::post('/participants', [ParticipantController::class, 'store'])->name('participants.store');
// Route::get('/participants/{id}/edit', [ParticipantController::class, 'edit'])->name('participants.edit');
// Route::put('/participants/{id}', [ParticipantController::class, 'update'])->name('participants.update');
// Route::delete('/participants/{id}', [ParticipantController::class, 'destroy'])->name('participants.destroy');
// Route::get('/participants/{id}', [ParticipantController::class, 'show'])->name('participants.show');

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';