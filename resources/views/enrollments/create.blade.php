@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card card-custom border-0 p-4 p-md-5">
                <h3 class="fw-bold mb-1" style="color: #0f172a;">Tambah Pendaftaran</h3>
                <p class="text-muted small mb-4">Pilih peserta dan kursus yang berstatus open untuk didaftarkan.</p>

                <form action="{{ route('enrollments.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="participant_id" class="form-label fw-semibold small text-uppercase text-secondary">Peserta</label>
                        <select id="participant_id" name="participant_id" class="form-select @error('participant_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Peserta --</option>
                            @foreach ($participants as $participant)
                                <option value="{{ $participant->id }}" @selected(old('participant_id') == $participant->id)>
                                    {{ $participant->name }} ({{ $participant->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('participant_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="course_id" class="form-label fw-semibold small text-uppercase text-secondary">Kursus</label>
                        <select id="course_id" name="course_id" class="form-select @error('course_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Kursus --</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" @selected(old('course_id') == $course->id)>
                                    {{ $course->code }} - {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <a href="{{ route('enrollments.index') }}" class="btn btn-light text-secondary w-50 py-2 fw-semibold">Lihat Data</a>
                        <button type="submit" class="btn btn-primary btn-custom-primary text-white w-50 py-2">Simpan Pendaftaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection