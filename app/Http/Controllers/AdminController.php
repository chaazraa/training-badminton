<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Coach;
use App\Models\Participant;
use App\Models\Payment;

class AdminController extends Controller
{
    public function dashboard()
    {
        $schedules   = Schedule::all();
        $coaches     = Coach::all();
        $participants = Participant::all();
        $payments    = Payment::all();

        return view('admin.dashboard', compact('schedules', 'coaches', 'participants', 'payments'));
    }
}
