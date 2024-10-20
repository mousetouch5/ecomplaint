<?php

namespace App\Http\Controllers;
use App\Models\Complaint;
use Illuminate\Http\Request;


class SettledComplaintsController extends Controller
{
    public function index(Request $request)
    {
        $query = Complaint::where('status', 'fixed');

        // Filter by search term (if any)
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('first_name', 'LIKE', "%$searchTerm%")
                  ->orWhere('last_name', 'LIKE', "%$searchTerm%")
                  ->orWhere('complaint', 'LIKE', "%$searchTerm%")
                  ->orWhere('address', 'LIKE', "%$searchTerm%");
            });
        }

        // Filter by year (if selected)
        if ($request->has('year') && $request->year != '') {
            $query->whereYear('settled_at', $request->year);
        }

        // Fetch the complaints from the query
        $settledComplaints = $query->orderBy('settled_at', 'desc')->get();

        // Pass the complaints to the view


        return view('admin.SettledComplaints', compact('settledComplaints'));
    }
}
