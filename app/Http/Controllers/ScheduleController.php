<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
class ScheduleController extends Controller
{
    //
    public function store(Request $request)
{
    $request->validate([
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
    ]);

    Schedule::create([
        'date' => $request->date,
        'time' => $request->time,
        'user_id' => auth()->id(),  // Store the ID of the logged-in user
    ]);
    return redirect()->route('dashboard')->with('success', 'Schedule added successfully.');
}


}
