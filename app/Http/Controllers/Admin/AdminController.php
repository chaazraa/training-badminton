<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\Admin;
use App\Models\Schedule;
use App\Models\Coach;
use App\Models\Booking;

class UserController extends Controller
{

    public function dashboard()
    {
        $schedules  = Schedule::all();
        $coaches    = Coach::where('admin_id', auth()->id())->get();
        $bookings   = Booking::where('admin_id', auth()->id())->get();

        return view('admin.dashboard', compact('schedules', 'coaches', 'bookings'));
    }
}