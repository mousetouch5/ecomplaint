<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback; 
use Illuminate\Support\Facades\Auth;
class FeedbackController extends Controller
{
    //

    public function store(Request $request)
    {
        // Validate the form input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'nullable|email|max:255', // Make email nullable
        'complaint' => 'required|string',
    ]);

        // Create a new feedback entry with the authenticated user's ID
        Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'complaint' => $request->complaint,
            'user_id' => Auth::id(), // Get the authenticated user's ID
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }

}
