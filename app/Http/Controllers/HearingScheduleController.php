<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Complaint; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HearingScheduleController extends Controller
{
    public function index()
    {
        // Get the current date
        $currentDate = Carbon::now()->format('Y-m-d');

        // Retrieve all schedules with related user data
        $schedules = Schedule::with('user')->get();

        // Loop through each schedule and check if the date matches the current date
        foreach ($schedules as $schedule) {
            if ($schedule->date == $currentDate && $schedule->updates != 'done') {
                // Update the schedule status to 'done'
                $schedule->updates = 'done';
                $schedule->save(); // Save the updated status to the database
            }
        }

        // Retrieve all complaints
        $complaints = Complaint::all();

        // Complaints this week
        $complaintsThisWeek = Complaint::whereBetween('created_at', [
            Carbon::now()->startOfWeek(), 
            Carbon::now()->endOfWeek()
        ])->count();

        // Pending complaints with status 'not_fixed' this week
        $pendingComplaintsThisWeek = Complaint::where('status', 'not_fixed')
            ->whereBetween('created_at', [
                Carbon::now()->startOfWeek(), 
                Carbon::now()->endOfWeek()
            ])->count();

        // Pending complaints with status 'fixed' this week
        $pendingComplaintsThisWeek2 = Complaint::where('status', 'fixed')
            ->whereBetween('created_at', [
                Carbon::now()->startOfWeek(), 
                Carbon::now()->endOfWeek()
            ])->count();

        // Pass the schedules and complaints to the view
        return view('admin.HearingSchedule', compact('schedules', 'complaints', 'complaintsThisWeek', 'pendingComplaintsThisWeek', 'pendingComplaintsThisWeek2'));
    }

public function update(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'date' => 'required|date',
        'time' => 'required',
    ]);

    try {
        // Attempt to find the schedule by ID
        $schedule = Schedule::findOrFail($id);
        
        // Update the schedule fields
        $schedule->date = $validatedData['date'];
        $schedule->time = $validatedData['time'];
        $schedule->updates = 'ongoing'; // Set 'updates' to 'ongoing'
        $schedule->save(); // Save the changes
        
        // Return a success response for AJAX
        return response()->json(['message' => 'Schedule updated successfully.']);
    } catch (ModelNotFoundException $e) {
        // Return an error response for AJAX
        return response()->json(['message' => 'Schedule not found.'], 404);
    } catch (\Exception $e) {
        // Handle other exceptions (e.g., database errors)
        \Log::error('Error updating schedule: ' . $e->getMessage()); // Log the error for debugging
        return response()->json(['message' => 'Error updating schedule: ' . $e->getMessage()], 500);
    }
}







}
