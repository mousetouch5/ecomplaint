<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\NumberOfComplaintsController;
use App\Http\Controllers\SettledComplaintsController;
use App\Http\Controllers\NumberOfPendingComplaintController;
use App\Http\Controllers\HearingScheduleController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\UserFeedBackController;
use App\Http\Controllers\CustomAuthenticatedSessionController;

Route::post('/login', [CustomAuthenticatedSessionController::class, 'store'])->middleware('guest');

Route::put('/complaints/{id}/status', [ComplaintController::class, 'updateStatus'])->name('complaints.updateStatus');
     //for updating hearing schedule




Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store'); //feedback     
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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



Route::get('/number-of-complaints', [NumberOfComplaintsController::class, 'index'])->name('admin.NumberOfComplaints.index');
Route::get('/SettledComplaints', [SettledComplaintsController::class, 'index'])->name('admin.SettledComplaints.index');
Route::get('/NumberOfPendingComplaints', [NumberOfPendingComplaintController::class, 'index'])->name('admin.NumberOfPendingComplaints.index');
Route::get('/HearingSchedule', [HearingScheduleController::class, 'index'])->name('admin.HearingSchedule.index');
Route::get('/adminDashboard', [AdminDashboardController::class, 'index'])->name('admin.adminDashboard.index');
Route::get('/Analytics', [AnalyticsController::class, 'index'])->name('admin.Analytics.index');
Route::get('/UserFeedBack', [UserFeedBackController::class, 'index'])->name('admin.UserFeedBack.index');
Route::resource('admin/NumberOfComplaints', NumberOfComplaintsController::class);
Route::resource('admin/SettledComplaints', SettledComplaintsController::class);
Route::resource('admin/adminDashboard', AdminDashboardController::class);
Route::resource('admin/NumberOfPendingComplaints',NumberOfPendingComplaintController::class);
Route::resource('admin/HearingSchedule', HearingScheduleController::class);
Route::resource('admin/Analytics', AnalyticsController::class);
Route::resource('admin/UserFeedBack', UserFeedBackController::class);



Route::post('/fetch-complaints', [NumberOfComplaintsController::class, 'fetchComplaints'])->name('fetch.complaints');



Route::middleware('auth')->group(function () {
    Route::get('schedules', [ScheduleController::class, 'index'])->name('schedules.index');
    Route::post('schedules', [ScheduleController::class, 'store'])->name('schedules.store');
});

