<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        // Fetch all schedules for availability checking
        $schedules = Schedule::all();

        // Fetch the schedules booked by the logged-in user
        $userSchedules = Schedule::where('user_id', Auth::id())->get();

        return view('dashboard', compact('schedules', 'userSchedules'));
    }

    public function store(Request $request)
    {
        // Validate and store the schedule
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
        ]);

        // Check if the schedule is already taken
        $existingSchedule = Schedule::where('date', $request->date)
            ->where('time', $request->time)
            ->first();

        if ($existingSchedule) {
            return redirect()->back()->with('error', 'This schedule is already taken. Please choose another time.');
        }

        // Create the schedule and associate it with the logged-in user
        Schedule::create([
            'date' => $request->date,
            'time' => $request->time,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Schedule saved successfully.');
    }
}
