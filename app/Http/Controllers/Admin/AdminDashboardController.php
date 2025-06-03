<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Coach;
use App\Models\Booking;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data jadwal, pelatih, dan booking
        $schedules = Schedule::all();
        $coaches   = Coach::all();
        $bookings  = Booking::all();

        // Kirim data ke view admin.dashboard
        return view('admin.dashboard', compact('schedules', 'coaches', 'bookings'));
    }
}
