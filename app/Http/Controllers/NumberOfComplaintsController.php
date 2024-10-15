<?php

namespace App\Http\Controllers;

use App\Models\Complaint; // Make sure to import your Complaint model
use Illuminate\Http\Request;

class NumberOfComplaintsController extends Controller
{
    public function index()
    {
        // Fetch complaints for this week (You can customize the query as per your requirement)
        $complaints = Complaint::where('created_at', '> =', now()->startOfWeek())->get();
        $complaintsThisWeek = $complaints->count();

        return view('admin.NumberOfComplaints', compact('complaints', 'complaintsThisWeek'));
    }


        public function fetchComplaints(Request $request)
    {
        $period = $request->input('period');

        // Fetch complaints based on the period
        if ($period === 'today') {
            $complaints = Complaint::whereDate('created_at', today())->get();
        } elseif ($period === 'week') {
            $complaints = Complaint::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->get();
        } elseif ($period === 'month') {
            $complaints = Complaint::whereMonth('created_at', now()->month)->get();
        }

        return response()->json($complaints); // Return the complaints as JSON
    }



}

