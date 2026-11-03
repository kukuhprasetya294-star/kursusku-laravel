import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import $ from 'jquery';

window.$ = window.jQuery = $;

$(document).ready(function () {
    $('#courseSelect').on('change', function () {
        let course = $(this).val();
        let statusBox = $('#seatStatus');

        if (!course) {
            statusBox.removeClass()
                     .addClass('alert py-2-5 px-3 mb-4 small border-0 rounded-3 text-secondary')
                     .css({'background-color': '#f1f5f9', 'color': '#64748b'})
                     .html('Pilih kursus untuk melihat sisa kursi.');
            return;
        }

        $.ajax({
            url: '/enrollments/check-seats',
            type: 'GET',
            data: { course: course },
            success: function (response) {
                if (response.seats > 0) {
                    statusBox.removeClass()
                             .addClass('alert py-2-5 px-3 mb-4 small border-0 rounded-3')
                             .css({'background-color': '#ecfdf5', 'color': '#047857'})
                             .html('✓ ' + response.seats + ' kursi tersisa untuk ' + course + '.');
                } else {
                    statusBox.removeClass()
                             .addClass('alert py-2-5 px-3 mb-4 small border-0 rounded-3')
                             .css({'background-color': '#fef2f2', 'color': '#b91c1c'})
                             .html('✕ Maaf, kursi untuk ' + course + ' sudah penuh!');
                }
            },
            error: function () {
                statusBox.removeClass()
                         .addClass('alert py-2-5 px-3 mb-4 small border-0 rounded-3')
                         .css({'background-color': '#fffbeb', 'color': '#b45309'})
                         .html('Gagal mengambil data ketersediaan kursi.');
            }
        });
    });
});