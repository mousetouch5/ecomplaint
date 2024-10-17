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
        // Fetch all schedules from the database
        $schedules = Schedule::with('user')->get();

        if (Auth::user()->role !== 'admin') {
        // Redirect to the user's dashboard if not an admin
        return redirect()->route('dashboard'); // Change 'dashboard' to the actual name of the user's dashboard route
        }
        
        $complaints = Complaint::all(); // Adjust this if you want to filter or paginate the results
        $complaintsThisWeek = Complaint::whereBetween('created_at', [
            Carbon::now()->startOfWeek(), 
            Carbon::now()->endOfWeek()
        ])->count();

        $pendingComplaintsThisWeek = Complaint::where('status', 'not_fixed') // Adjust status name as necessary
            ->whereBetween('created_at', [
                Carbon::now()->startOfWeek(), 
                Carbon::now()->endOfWeek()
            ])->count();

    $pendingComplaintsThisWeek2 = Complaint::where('status', 'fixed') // Adjust status name as necessary
            ->whereBetween('created_at', [
                Carbon::now()->startOfWeek(), 
                Carbon::now()->endOfWeek()
            ])->count();




        // Pass the schedules to the view
        return view('admin.HearingSchedule', compact('schedules','complaints','complaintsThisWeek','pendingComplaintsThisWeek'
    
            ,'pendingComplaintsThisWeek2'));
    }
}
