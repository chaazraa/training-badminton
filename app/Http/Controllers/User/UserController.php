<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Models\User;
use App\Models\Schedule;
use App\Models\Coach;
use App\Models\Booking;

class UserController extends Controller
{

    public function dashboard()
    {
        $schedules  = Schedule::all();
        $coaches    = Coach::where('user_id', auth()->id())->get();
        $bookings   = Booking::where('user_id', auth()->id())->get();

        return view('user.dashboard', compact('schedules', 'coaches', 'bookings'));
    }
}