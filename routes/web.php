<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});

// Route Pertemuan 9 - Enrollments & Ajax Check Seats
Route::get('/enrollments/create', [EnrollmentController::class, 'create'])->name('enrollments.create');
Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');
Route::get('/enrollments/check-seats', [EnrollmentController::class, 'checkSeats'])->name('enrollments.checkSeats');

// Route Pertemuan 10 - Course Management
Route::resource('courses', CourseController::class);