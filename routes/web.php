<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ScheduleController;


// Halaman setelah login
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/', function () {
    return view('landing');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/trainings', [trainingController::class, 'index'])->name('trainings.index');

Route::middleware('auth')->group(function () {
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Route::resource('users', UserController::class);
    Route::resource('trainings', TrainingController::class);
    //Route::resource('participants', ParticipantController::class);
   // Route::resource('schedules', ScheduleController::class);
    //Route::get('/add-schedule', [ScheduleController::class, 'createSchedule']);
});

require __DIR__.'/auth.php';
