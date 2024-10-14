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
            'files.*' => 'file|mimes:jpg,jpeg,png,gif,mp4,mp3|max:2048', // Validate files
        ]);

        // Handle file uploads
        $filePaths = []; // Array to store file paths

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                if ($file->isValid()) {
                    // Store the file in the uploads folder
                    $filePath = $file->move(public_path('uploads/photosandvideos'), $file->getClientOriginalName()); // Store in 'uploads/photosandvideos' folder
                    $filePaths[] = 'uploads/photosandvideos/' . $file->getClientOriginalName(); // Add the path to the array
                    \Log::info('Uploaded file path: ' . $filePath); // Log the uploaded file path
                } else {
                    \Log::error('Invalid file: ' . $file->getClientOriginalName());
                }
            }
        } else {
            \Log::warning('No files were uploaded');
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
                'uploaded_file' => json_encode($filePaths), // Store file paths as JSON
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
