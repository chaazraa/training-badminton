<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\RoleMiddleware;

// Landing Page
Route::get('/', function () {
    return view('landing');
});

// Home Page
Route::get('/home', function () {
    return view('home');
});

// Middleware untuk User yang Sudah Login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return auth()->user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.dashboard');
    })->name('dashboard');
});

    

// 🔹 Route untuk Admin
Route::middleware(['auth', RoleMiddleware::class.':admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('schedules',  AdminScheduleController::class);
    Route::resource('coaches', AdminCoachController::class);
    Route::resource('participants', AdminParticipantController::class)->middleware(CheckExpiredPayments::class);
    Route::resource('payments', AdminPaymentController::class);
});

// **Dashboard User**
Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [ParticipantController::class, 'index'])->name('dashboard');
});

// **Route untuk Semua Resource Controller**
Route::resource('schedules', ScheduleController::class);
Route::resource('participants', ParticipantController::class);
Route::resource('users', UserController::class);
Route::resource('coaches', CoachController::class);

// **Profile Routes**
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication Routes
require __DIR__.'/auth.php';
