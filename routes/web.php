<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\NumberOfComplaintsController;
use App\Http\Controllers\SettledComplaintsController;
use App\Http\Controllers\NumberOfPendingComplaintController;
use App\Http\Controllers\HearingScheduleController;
use App\Http\Controllers\AdminRegistrationController;

Route::get('admin/register', [AdminRegistrationController::class, 'create'])->name('admin.register');
Route::post('admin/register', [AdminRegistrationController::class, 'store']);

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
Route::get('/number-of-complaints', [NumberOfComplaintsController::class, 'index'])->name('admin.NumberOfComplaints.index');
Route::get('/SettledComplaints', [SettledComplaintsController::class, 'index'])->name('admin.SettledComplaints.index');
Route::get('/NumberOfPendingComplaints', [NumberOfPendingComplaintController::class, 'index'])->name('admin.NumberOfPendingComplaints.index');
Route::get('/HearingSchedule', [HearingScheduleController::class, 'index'])->name('admin.HearingSchedule.index');
Route::get('/adminDashboard', [AdminDashboardController::class, 'index'])->name('admin.adminDashboard.index');
Route::resource('admin/NumberOfComplaints', NumberOfComplaintsController::class);
Route::resource('admin/SettledComplaints', SettledComplaintsController::class);
Route::resource('admin/adminDashboard', AdminDashboardController::class);
Route::resource('admin/NumberOfPendingComplaints',NumberOfPendingComplaintController::class);
Route::resource('admin/HearingSchedule', HearingScheduleController::class);



Route::post('/fetch-complaints', [NumberOfComplaintsController::class, 'fetchComplaints'])->name('fetch.complaints');