@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1" style="color: #0f172a;">Data Pendaftaran</h3>
            <p class="text-muted small mb-0">Daftar seluruh peserta yang telah terdaftar pada kursus.</p>
        </div>
        <a href="{{ route('enrollments.create') }}" class="btn btn-primary btn-custom-primary text-white px-3 py-2">
            + Tambah Pendaftaran
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4 d-flex align-items-center justify-content-between">
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card card-custom border-0 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="py-3 px-4">#</th>
                        <th class="py-3">Peserta</th>
                        <th class="py-3">Kursus</th>
                        <th class="py-3">Tanggal Mulai</th>
                        <th class="py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enrollments as $index => $enrollment)
                        <tr>
                            <td class="px-4 fw-semibold">{{ $index + 1 }}</td>
                            <td>
                                <div class="fw-bold" style="color: #0f172a;">{{ $enrollment->participant->name }}</div>
                                <div class="text-muted small">{{ $enrollment->participant->email }}</div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border font-monospace px-2 py-1 me-1">{{ $enrollment->course->code }}</span>
                                <span class="fw-semibold">{{ $enrollment->course->name }}</span>
                            </td>
                            <td>{{ $enrollment->course->start_date ? $enrollment->course->start_date->format('d-m-Y') : '-' }}</td>
                            <td>
                                <span class="badge bg-success rounded-pill px-3 py-1">{{ $enrollment->status }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">Belum ada data pendaftaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection