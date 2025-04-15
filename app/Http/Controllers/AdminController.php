<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

    class AdminController extends Controller
    {
        public function dashboard()
        {
            $schedules  = Schedule::all();
            $coaches    = Coach::all();
           
    
            return view('admin.dashboard', compact('swimmingpools', 'allotments', 'bookings', 'payments'));
        }
    } 