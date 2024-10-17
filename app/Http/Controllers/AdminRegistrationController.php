<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminRegistrationController extends Controller
{
    public function create()
    {
        return view('auth.admin-register'); // Create this view
    }

    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the admin user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', // Automatically assign admin role
        ]);

        \Log::info('Created user: ', ['user' => $user]);

        // Optional: Assign admin role if you're using roles
        // $user->assignRole('admin'); // Uncomment if using a role management package

        return redirect()->route('login')->with('success', 'Admin registered successfully!'); // Redirect to an appropriate route
    }
}
