<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        // Logic to list schedules
        $schedules = Schedule::where('user_id', Auth::id())->get();
        return view('dashboard', compact('schedules'));
     
    }

    public function store(Request $request)
    {
        // Validate and store the schedule
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
        ]);

        // Create the schedule and associate it with the logged-in user
        Schedule::create([
            'date' => $request->date,
            'time' => $request->time,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Schedule saved successfully.');
    }
}
