<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFeedBackController extends Controller
{
    public function index()
    {

    return view('admin.UserFeedBack');
    }

}
