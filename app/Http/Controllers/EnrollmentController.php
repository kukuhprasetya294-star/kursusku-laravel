<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    private function getCourses()
    {
        return [
            ['id' => 1, 'code' => 'WEB-01', 'name' => 'Web Dasar', 'seats' => 5],
            ['id' => 2, 'code' => 'PHP-01', 'name' => 'PHP Dasar', 'seats' => 0],
            ['id' => 3, 'code' => 'LAR-01', 'name' => 'Laravel Fundamental', 'seats' => 3],
        ];
    }

    public function create()
    {
        $courses = $this->getCourses();
        return view('pendaftaran', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'course_id' => 'required|numeric',
        ]);

        return redirect()->route('home')->with('success', 'Pendaftaran berhasil dikirim!');
    }

    public function checkSeats(Request $request)
    {
        $courseId = $request->query('course_id');
        $courses = collect($this->getCourses());
        $course = $courses->firstWhere('id', (int) $courseId);

        if (!$course) {
            return response()->json(['message' => 'Kursus tidak ditemukan'], 404);
        }

        return response()->json([
            'course_name' => $course['name'],
            'seats' => $course['seats'],
            'available' => $course['seats'] > 0,
        ]);
    }
}