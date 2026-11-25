<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Participant;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $featuredCourses = Course::where('status', 'open')
        ->orderBy('start_date')
        ->take(6)
        ->get();

    $stats = [
        'total_courses' => Course::count(),
        'open_courses' => Course::where('status', 'open')->count(),
        'total_participants' => Participant::count(),
        'total_enrollments' => Enrollment::count(),
    ];

    return view('landing', compact('featuredCourses', 'stats'));
})->name('landing');

Route::resource('courses', CourseController::class);

Route::resource('enrollments', EnrollmentController::class)
    ->only(['index', 'create', 'store']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});