@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1" style="color: #0f172a;">Daftar Kursus</h3>
            <p class="text-muted small mb-0">Kelola dan lihat seluruh daftar kursus yang tersedia.</p>
        </div>
        <a href="{{ route('courses.create') }}" class="btn btn-custom-primary text-white px-3 py-2">
            + Tambah Kursus
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4" style="background-color: #ecfdf5; color: #065f46;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card card-custom overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="py-3 px-4">#</th>
                        <th class="py-3">Judul Kursus</th>
                        <th class="py-3">Deskripsi</th>
                        <th class="py-3">Kuota</th>
                        <th class="py-3">Tanggal Mulai</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $index => $course)
                        <tr>
                            <td class="px-4 fw-semibold">{{ $index + 1 }}</td>
                            <td class="fw-bold" style="color: #0f172a;">{{ $course->title }}</td>
                            <td class="text-secondary small">{{ Str::limit($course->description, 50) }}</td>
                            <td><span class="badge bg-primary rounded-pill px-3 py-2">{{ $course->quota }} Kursi</span></td>
                            <td>{{ $course->start_date ? $course->start_date->format('d M Y') : '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">Belum ada data kursus.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection