<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\CheckExpiredPayments;

// User Controllers
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\BookingController as UserBookingController;
use App\Http\Controllers\User\ScheduleController as UserScheduleController;
use App\Http\Controllers\User\CoachController as UserCoachController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ScheduleController as AdminScheduleController;
use App\Http\Controllers\Admin\CoachController as AdminCoachController;
use App\Http\Controllers\Admin\ParticipantController as AdminParticipantController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;

// 🔹 Landing Page
Route::get('/', fn() => view('landing'));

// 🔹 Redirect Dashboard
Route::get('/dashboard', function () {
    return auth()->user()->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
    Route::resource('bookings', UserBookingController::class);
    Route::get('/schedules', [UserScheduleController::class, 'index'])->name('schedules.index');
    Route::get('/coaches', [UserCoachController::class, 'index'])->name('coaches.index');
    Route::get('/coaches/{coach}', [UserCoachController::class, 'show'])->name('coaches.show'); // Tambahkan route ini
});


// =======================
// 🔹 ADMIN ROUTES
// =======================
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('schedules', AdminScheduleController::class);
    Route::resource('coaches', AdminCoachController::class);
    Route::resource('participants', AdminParticipantController::class)->middleware(CheckExpiredPayments::class);
    Route::resource('payments', AdminPaymentController::class);
});

// 🔹 Auth (Laravel Breeze/Fortify/etc)
require __DIR__ . '/auth.php';
