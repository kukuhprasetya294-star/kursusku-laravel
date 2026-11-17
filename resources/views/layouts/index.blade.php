<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Enrollment Kursusku</title>
</head>
<body>
    <h1>Laporan Enrollment Kursusku</h1>

    @if (session('success'))
        <div style="color: green; margin-bottom: 12px;">
            {{ session('success') }}
        </div>
    @endif

    <p>
        <a href="{{ route('enrollments.create') }}">+ Tambah Enrollment</a> |
        <a href="{{ route('courses.index') }}">Daftar Kursus</a>
    </p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Participant</th>
                <th>Course</th>
                <th>Start Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($enrollments as $enrollment)
                <tr>
                    <td>{{ $enrollment->participant->name }}</td>
                    <td>{{ $enrollment->course->name }}</td>
                    <td>{{ $enrollment->course->start_date }}</td>
                    <td>{{ $enrollment->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada enrollment.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>