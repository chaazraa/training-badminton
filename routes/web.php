<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleMiddleware;

// USER CONTROLLERS
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\BookingController as UserBookingController;
use App\Http\Controllers\User\ScheduleController as PublicScheduleController;
use App\Http\Controllers\User\CoachController as PublicCoachController;

// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ScheduleController as AdminScheduleController;
use App\Http\Controllers\Admin\CoachController as AdminCoachController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;

// =============================
// 🔹 LANDING (TANPA LOGIN)
// =============================
Route::get('/', fn () => view('landing'))->name('home');
Route::get('/home', fn () => view('landing'));

// =============================
// 🔹 JADWAL & COACH (PUBLIC, TANPA LOGIN)
// =============================
Route::get('/schedules', [PublicScheduleController::class, 'index'])->name('schedules.index');
Route::get('/schedules/{schedule}', [PublicScheduleController::class, 'show'])->name('schedules.show');

Route::get('/coaches', [PublicCoachController::class, 'index'])->name('coaches.index');
Route::get('/coaches/{coach}', [PublicCoachController::class, 'show'])->name('coaches.show');

// =============================
// 🔹 REDIRECT SETELAH LOGIN
// =============================
Route::get('/dashboard', function () {
    return auth()->user()->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// =============================
// 🔹 PROFILE (UNTUK SEMUA USER LOGIN)
// =============================
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =============================
// 🔹 USER ROUTES (KHUSUS ROLE: user)
// =============================
Route::middleware(['auth', RoleMiddleware::class . ':user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
        Route::resource('bookings', UserBookingController::class);
        Route::get('bookings/payment', [UserBookingController::class, 'payment'])->name('bookings.payment');
    });

// =============================
// 🔹 ADMIN ROUTES (KHUSUS ROLE: admin)
// =============================
Route::middleware(['auth', RoleMiddleware::class . ':admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('schedules', AdminScheduleController::class);
        Route::resource('coaches', AdminCoachController::class);
        Route::resource('bookings', AdminBookingController::class);
        Route::resource('payments', AdminPaymentController::class);
    });

// =============================
// 🔹 ROUTE OTENTIKASI BREEZE
// =============================
require __DIR__ . '/auth.php';
