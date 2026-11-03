<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function create()
    {
        return view('enrollments.create');
    }

    public function checkSeats(Request $request)
    {
        $course =$request->query('course');

        $seatsData = [
            'PHP Dasar' => 8,
            'Web Dasar' => 12,
            'Laravel Dasar' => 4,
        ];

        $seats = $seatsData[$course] ?? 0;

        return response()->json([
            'status' => 'success',
            'course' => $course,
            'seats' => $seats,
            'message' => $seats > 0 ? "Tersedia {$seats} kursi" : "Kursi penuh"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'course' => 'required|string',
        ]);

        return redirect('/')->with('success', 'Pendaftaran berhasil dikirim!');
    }
}