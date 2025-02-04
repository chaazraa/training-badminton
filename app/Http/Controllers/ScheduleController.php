<?php

// app/Http/Controllers/ScheduleController.php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        // Mengambil semua data schedule
        $schedules = Schedule::all();

        // Mengembalikan data schedule ke view
        return view('schedule.index', compact('schedules'));
    }
}