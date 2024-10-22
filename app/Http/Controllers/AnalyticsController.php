<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class AnalyticsController extends Controller
{

    public function index()
{

    // Get the number of complaints filed in each month
    $complaintsByMonth = Complaint::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->pluck('count', 'month');

    // Create an array with 0 as the default value for each month
    $monthlyComplaints = array_fill(1, 12, 0);

    // Fill the array with actual data
    foreach ($complaintsByMonth as $month => $count) {
        $monthlyComplaints[$month] = $count;
    }

    return view('admin.Analytics', compact('monthlyComplaints'));
    



}

}
