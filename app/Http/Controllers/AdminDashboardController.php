<?php

namespace App\Http\Controllers;
use App\Models\Complaint; 
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
      // Display the admin dashboard
      public function index(){

                // Fetch all complaints from the database
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


        return view('Admin.AdminDashBoard', compact('complaints','complaintsThisWeek','pendingComplaintsThisWeek'
    
            ,'pendingComplaintsThisWeek2')); // Pass the complaints to the view

          //return view('Admin.AdminDashBoard'); // Adjust the view path as necessary
      }
}
