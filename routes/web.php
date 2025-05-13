<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\CheckExpiredPayments;

// 🔹 Halaman Utama
Route::get('/', function () {
    return view('landing');
});

// Route::get('/home', function () {
//     return view('home');
// }); 

// 🔹 Redirect Dashboard Berdasarkan Role
Route::get('/dashboard', function () {
    return auth()->user()->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 🔹 Authenticated Routes
Route::middleware('auth')->group(function () {
    // 🔹 Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 🔹 Booking Routes
    Route::prefix('bookings')->name('bookings.')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');
        Route::get('/create', [BookingController::class, 'create'])->name('create');
        Route::post('/', [BookingController::class, 'store'])->name('store');
        Route::get('/{booking}', [BookingController::class, 'show'])->name('show');
        Route::get('/{booking}/edit', [BookingController::class, 'edit'])->name('edit');
        Route::put('/{booking}', [BookingController::class, 'update'])->name('update');
        Route::delete('/{booking}', [BookingController::class, 'destroy'])->name('destroy');
    });

    // 🔹 Dashboard User
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [ParticipantController::class, 'index'])->name('dashboard');
    });
});

// 🔹 Admin Routes
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('schedules', App\Http\Controllers\AdminScheduleController::class);
    Route::resource('coaches', App\Http\Controllers\AdminCoachController::class);
    Route::resource('participants', App\Http\Controllers\AdminParticipantController::class)
        ->middleware(CheckExpiredPayments::class);
    Route::resource('payments', App\Http\Controllers\AdminPaymentController::class);
});

// 🔹 Public Resource Routes (optional, jika dibutuhkan semua role)
Route::resource('schedules', ScheduleController::class);
Route::resource('participants', ParticipantController::class);
Route::resource('users', UserController::class);
Route::resource('coaches', CoachController::class);

// 🔹 Authentication Routes (default Laravel Breeze/Fortify/etc)
require __DIR__ . '/auth.php';
