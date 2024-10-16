<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
 
    public function index() {
        $schedules = Schedule::all();

        // Fetch the schedules booked by the logged-in user
        $userSchedules = Schedule::where('user_id', Auth::id())->get();

        return view('dashboard', compact('schedules', 'userSchedules'));


    
}
 
    //
}
