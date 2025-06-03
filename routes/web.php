<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\CheckExpiredPayments;

// User Controllers
use App\Http\Controllers\User\UserDashboardController as UserDashboardController;
use App\Http\Controllers\User\BookingController as UserBookingController;
use App\Http\Controllers\User\ScheduleController as UserScheduleController;
use App\Http\Controllers\User\CoachController as UserCoachController;

// Admin Controllers
use App\Http\Controllers\Admin\AdminDashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ScheduleController as AdminScheduleController;
use App\Http\Controllers\Admin\CoachController as AdminCoachController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;

// 🔹 Landing Page
Route::get('/', fn() => view('landing'));

// 🔹 Redirect Dashboard
Route::get('/dashboard', function () {
    return auth()->user()->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});


// 🔹 Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =======================
// 🔹 USER ROUTES
// =======================
Route::middleware(['auth', RoleMiddleware::class . ':user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::resource('bookings', UserBookingController::class);  // Ini sudah mencakup create, store, show, dll.
    Route::get('/schedules', [UserScheduleController::class, 'index'])->name('schedules.index');
    Route::get('/schedules/{schedule}', [UserScheduleController::class, 'show'])->name('schedules.show');
    Route::get('/coaches', [UserCoachController::class, 'index'])->name('coaches.index');
    Route::get('/coaches/{coach}', [UserCoachController::class, 'show'])->name('coaches.show');
});


// =======================
// 🔹 ADMIN ROUTES
// =======================
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('schedules', AdminScheduleController::class);
    // Route::get('/schedules', [AdminScheduleController::class, 'index'])->name('schedules.index');
    // Route::get('/schedules/{schedule}', [AdminScheduleController::class, 'show'])->name('schedules.show');
    // Route::get('/schedules/create', [AdminScheduleController::class, 'create'])->name('schedules.create');
    // Route::get('/schedules/{schedule}/edit', [AdminScheduleController::class, 'edit'])->name('schedules.edit');
    Route::resource('coaches', AdminCoachController::class);
    // Route::get('/coaches', [AdminCoachController::class, 'index'])->name('coaches.index');
    // Route::get('/coaches/{coach}', [AdminCoachController::class, 'show'])->name('coaches.show');
    // Route::get('/coaches/create', [AdminCoachController::class, 'create'])->name('coaches.create');
    // Route::get('/coaches/{coach}/edit', [AdminCoachController::class, 'edit'])->name('coaches.edit');
    Route::resource('bookings', AdminBookingController::class);  // Ini sudah mencakup create, store, show, dll.
    // Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    // Route::get('/bookings/create', [AdminBookingController::class, 'create'])->name('bookings.create');
    // Route::get('/bookings/{booking}', [AdminBookingController::class, 'show'])->name('bookings.show');
    // Route::get('/bookings/{booking}/edit', [AdminBookingController::class, 'edit'])->name('bookings.edit');
    Route::resource('payments', AdminPaymentController::class);
});

// 🔹 Auth (Laravel Breeze/Fortify/etc)
require __DIR__ . '/auth.php';
