<?php

namespace App\Http\Controllers;

use App\Models\Complaint; // Make sure to import your Complaint model
use Illuminate\Http\Request;

class NumberOfComplaintsController extends Controller
{
    public function index()
    {
        // Fetch complaints for this week (You can customize the query as per your requirement)
        $complaints = Complaint::where('created_at', '>=', now()->startOfWeek())->get();
        $complaintsThisWeek = $complaints->count();

        return view('admin.NumberOfComplaints', compact('complaints', 'complaintsThisWeek'));
    }
}
