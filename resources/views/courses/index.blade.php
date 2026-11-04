@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1" style="color: #0f172a;">Daftar Kursus</h3>
            <p class="text-muted small mb-0">Kelola dan lihat seluruh daftar kursus yang tersedia.</p>
        </div>
        <a href="{{ route('courses.create') }}" class="btn btn-primary text-white px-3 py-2">
            + Tambah Kursus
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4 d-flex align-items-center justify-content-between">
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="py-3 px-4">#</th>
                        <th class="py-3">Kode</th>
                        <th class="py-3">Nama Kursus</th>
                        <th class="py-3">Biaya</th>
                        <th class="py-3">Kuota</th>
                        <th class="py-3">Tanggal Mulai</th>
                        <th class="py-3">Status</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $index => $course)
                        <tr>
                            <td class="px-4 fw-semibold">{{ $index + 1 }}</td>
                            <td><span class="badge bg-light text-dark border font-monospace px-2 py-1">{{ $course->code }}</span></td>
                            <td class="fw-bold" style="color: #0f172a;">{{ $course->name }}</td>
                            <td>Rp {{ number_format($course->fee, 0, ',', '.') }}</td>
                            <td><span class="badge bg-primary rounded-pill px-3 py-1">{{ $course->quota }} peserta</span></td>
                            <td>{{ $course->start_date ? $course->start_date->format('d-m-Y') : '-' }}</td>
                            <td>
                                @if($course->status === 'open')
                                    <span class="badge bg-success">Open</span>
                                @elseif($course->status === 'draft')
                                    <span class="badge bg-secondary">Draft</span>
                                @else
                                    <span class="badge bg-danger">Closed</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('courses.show', $course) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                    <form method="POST" action="{{ route('courses.destroy', $course) }}" onsubmit="return confirm('Hapus kursus ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">Belum ada data kursus.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection