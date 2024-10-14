<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint; 

class ComplaintController extends Controller
{
    public function store(Request $request)
    {
        // Log the incoming data
        \Log::info('Complaint Submission Data: ', $request->all());

        // Validate the form input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'sex' => 'required|in:Male,Female',
            'civil_status' => 'required|in:Single,Married,Divorced,Widowed',
            'complaint' => 'required|string',
            'files.*' => 'nullable|file|max:10240', // Max 10MB per file
        ]);

        // Handle file uploads
        $files = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('complaints', 'public');
                $files[] = $path;
            }
        }

        try {
            // Create a new complaint entry
            Complaint::create([
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'age' => $request->age,
                'sex' => $request->sex,
                'civil_status' => $request->civil_status,
                'complaint' => $request->complaint,
                'uploaded_files' => json_encode($files),
                'status' => 'not_fixed', // Default status
            ]);
            
            \Log::info('Complaint submitted successfully.');

            return response()->json(['success' => 'Complaint submitted successfully.'], 201);
        } catch (\Exception $e) {
            // Log any exceptions
            \Log::error('Error submitting complaint: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while submitting the complaint.'], 500);
        }
    }
}
