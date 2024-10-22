<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Feedback; 

class UserFeedBackController extends Controller
{
    public function index()
    {

        $feedbacks = Feedback::with('user')->get(); // Assuming you have a relationship to fetch user data if needed

        return view('admin.UserFeedBack', compact('feedbacks')); // Pass feedback data to the view
    }

}
