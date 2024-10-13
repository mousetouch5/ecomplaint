<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HearingScheduleController extends Controller
{
    public function index()
    {
       

        return view('admin.HearingSchedule');
    }
}
