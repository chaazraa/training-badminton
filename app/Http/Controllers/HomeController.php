<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use App\Models\Score;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class DashboardController extends Controller
{
    public function participant()
    {
        return view('participant.dashboard');
    }
    
    public function coach()
    {
        return view('coach.dashboard');
    }

    public function admin()
    {
        return view('admin.dashboard');
    }
}
