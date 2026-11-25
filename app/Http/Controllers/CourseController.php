<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Participant;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q'));
        $status = trim((string) $request->query('status'));
        $allowedStatuses = ['open', 'closed', 'draft'];

        $courses = Course::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('code', 'like', "%{$search}%")
                      ->orWhere('name', 'like', "%{$search}%");
                });
            })
            ->when(in_array($status, $allowedStatuses, true), function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        if ($request->boolean('partial')) {
            return view('courses._results', compact('courses'));
        }

        $stats = [
            'total_courses' => Course::count(),
            'open_courses' => Course::where('status', 'open')->count(),
            'total_participants' => Participant::count(),
            'total_enrollments' => Enrollment::count(),
        ];

        return view('courses.index', compact('courses', 'search', 'status', 'stats'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:courses,code',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'fee' => 'required|integer|min:0',
            'quota' => 'required|integer|min:1',
            'start_date' => 'nullable|date',
            'status' => 'required|in:open,closed,draft',
        ]);

        Course::create($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Kursus berhasil ditambahkan.');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:courses,code,' . $course->id,
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'fee' => 'required|integer|min:0',
            'quota' => 'required|integer|min:1',
            'start_date' => 'nullable|date',
            'status' => 'required|in:open,closed,draft',
        ]);

        $course->update($validated);

        return redirect()->route('courses.index')
            ->with('success', 'Kursus berhasil diperbarui.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Kursus berhasil dihapus.');
    }
}