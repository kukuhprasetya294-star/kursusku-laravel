<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;

// Halaman Beranda (Pertemuan 7)
Route::get('/', function () {
    return view('home');
});

// Halaman Form & Proses Ajax/Store (Pertemuan 9)
Route::get('/enrollments/create', [EnrollmentController::class, 'create'])->name('enrollments.create');
Route::get('/enrollments/check-seats', [EnrollmentController::class, 'checkSeats'])->name('enrollments.checkSeats');
Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');