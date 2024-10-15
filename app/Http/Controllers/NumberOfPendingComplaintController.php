<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint; // Import the Complaint model

class NumberOfPendingComplaintController extends Controller
{
    public function index()
    {
        // Retrieve all complaints
        $pendingComplaints = Complaint::all(); 

        // Iterate through the complaints and mask 'not_fixed' status as 'pending'
        foreach ($pendingComplaints as $complaint) {
            if ($complaint->status == 'not_fixed') {
                $complaint->status = 'pending'; // Mask the status as 'pending'
            }
        }

        // Pass the complaints to the view without saving to the database
        return view('admin.NumberOfPendingComplaints', compact('pendingComplaints'));
    }
}
