<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $course = $this->route('course');

        return [
            'code'        => [
                'required',
                'string',
                'max:20',
                Rule::unique('courses', 'code')->ignore($course),
            ],
            'name'        => ['required', 'string', 'min:3', 'max:120'],
            'description' => ['nullable', 'string', 'max:2000'],
            'fee'         => ['required', 'integer', 'min:0'],
            'quota'       => ['required', 'integer', 'between:1,500'],
            'start_date'  => ['required', 'date'],
            'status'      => ['required', 'in:draft,open,closed'],
        ];
    }

    public function messages(): array
    {
        return [
            'code.required'     => 'Kode kursus wajib diisi.',
            'code.unique'       => 'Kode kursus sudah digunakan oleh kursus lain.',
            'name.required'     => 'Nama kursus wajib diisi.',
            'name.min'          => 'Nama kursus minimal 3 karakter.',
            'fee.required'      => 'Biaya wajib diisi.',
            'fee.min'           => 'Biaya tidak boleh negatif.',
            'quota.required'    => 'Kuota kursi wajib diisi.',
            'quota.between'     => 'Kuota paling kecil 1 dan paling besar 500.',
            'start_date.required' => 'Tanggal mulai wajib diisi.',
            'status.required'   => 'Status wajib dipilih.',
            'status.in'         => 'Status harus berupa draft, open, atau closed.',
        ];
    }
}