@extends('layouts.app')

@section('title', 'Pendaftaran Kursus')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Formulir Pendaftaran Kursus</h4>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('enrollments.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="course_id" class="form-label">Pilih Kursus</label>
                        <select class="form-select" id="course_id" name="course_id" required>
                            <option value="" selected disabled>-- Pilih Kursus --</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course['id'] }}">
                                    {{ $course['code'] }} - {{ $course['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="button" id="btn-check-seat" class="btn btn-outline-info btn-sm" disabled>
                            Cek Ketersediaan Kursi (Ajax)
                        </button>
                        <div id="seat-info" class="mt-2 text-muted fw-bold"></div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Kirim Pendaftaran</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script type="module">
    $(document).ready(function() {
        $('#course_id').on('change', function() {
            let courseId = $(this).val();
            if (courseId) {
                $('#btn-check-seat').prop('disabled', false);
                $('#seat-info').html('');
            }
        });

        $('#btn-check-seat').on('click', function() {
            let courseId = $('#course_id').val();
            if (!courseId) return;

            $('#seat-info').html('<span class="text-primary">Mengecek sisa kursi...</span>');

            $.ajax({
                url: "{{ route('enrollments.seats') }}",
                type: "GET",
                data: { course_id: courseId },
                success: function(response) {
                    if (response.available) {
                        $('#seat-info').html(
                            '<span class="text-success">Tersedia ' + response.seats + ' kursi untuk ' + response.course_name + '.</span>'
                        );
                    } else {
                        $('#seat-info').html(
                            '<span class="text-danger">Maaf, kursi untuk ' + response.course_name + ' sudah penuh!</span>'
                        );
                    }
                },
                error: function() {
                    $('#seat-info').html('<span class="text-danger">Gagal mengecek sisa kursi.</span>');
                }
            });
        });
    });
</script>
@endsection