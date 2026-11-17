<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Enrollment</title>
</head>
<body>
    <h1>Tambah Enrollment</h1>

    <form method="POST" action="{{ route('enrollments.store') }}">
        @csrf

        <div style="margin-bottom: 12px;">
            <label for="participant_id">Participant</label><br>
            <select name="participant_id" id="participant_id" required>
                <option value="">-- Pilih Participant --</option>
                @foreach ($participants as $participant)
                    <option value="{{ $participant->id }}" @selected(old('participant_id') == $participant->id)>
                        {{ $participant->name }} ({{ $participant->email }})
                    </option>
                @endforeach
            </select>
            @error('participant_id')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="course_id">Course</label><br>
            <select name="course_id" id="course_id" required>
                <option value="">-- Pilih Course --</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" @selected(old('course_id') == $course->id)>
                        {{ $course->code }} - {{ $course->name }}
                    </option>
                @endforeach
            </select>
            @error('course_id')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Simpan Enrollment</button>
        <a href="{{ route('enrollments.index') }}" style="margin-left: 8px;">Lihat Laporan</a>
    </form>
</body>
</html>