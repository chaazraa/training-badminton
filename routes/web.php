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
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Middleware untuk User yang Sudah Login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return auth()->user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.dashboard');
    })->name('dashboard');
});

// Semua route yang terkait dengan tabel bookings
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');           // Menampilkan semua booking
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');  // Form tambah booking
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');          // Simpan booking baru
Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');   // Detail booking
Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit'); // Form edit
Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update'); // Update booking
Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy'); // Hapus booking
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::get('/booking', [BookingController::class, 'create']);
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');


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
