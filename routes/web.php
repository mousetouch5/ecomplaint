<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ComplaintController;



Route::middleware(['web'])->group(function () {
    Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.store');
});

//Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.store');
//Route::get('/complaint/create', [ComplaintController::class, 'create'])->name('complaint.create');
//Route::post('/complaint/store', [ComplaintController::class, 'store'])->name('complaint.store');


Route::get('/', function () {
    return redirect()->route('login');  // Redirect to the login route
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::resource('admin/adminDashboard', AdminDashboardController::class);