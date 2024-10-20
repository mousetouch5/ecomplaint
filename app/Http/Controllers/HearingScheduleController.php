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

        $schedules = Schedule::with('user')->where('date', '>', $currentDate)->get();
        Schedule::where('date', '<=', $currentDate)
        ->where('updates', 'ongoing') // Only update ongoing schedules
        ->update(['updates' => 'done']);

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
