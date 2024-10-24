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

public function getAvailableSchedules($date)
{
    // Fetch all schedules for the selected date
    $schedules = Schedule::where('date', $date)->get();
    
    // Determine available schedules (those not taken by any user)
    $availableSchedules = $schedules->filter(function($schedule) {
        return $schedule->updates !== 'done'; // Modify the condition based on your logic
    });

    return response()->json($availableSchedules);
}
 
    //
}
