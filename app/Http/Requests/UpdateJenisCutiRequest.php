<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateJenisCutiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => [
                'required',
                'string',
                'min:3',
                'max:50',
                Rule::unique('jenis_cutis', 'nama')->ignore($this->route('jenis_cuti'))
            ],
            'jumlah_hari' => 'required|integer|min:1'
        ];
    }
    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nama.required' => 'Nama jenis cuti wajib diisi',
            'nama.string' => 'Nama jenis cuti harus berupa teks',
            'nama.min' => 'Nama jenis cuti minimal 3 karakter',
            'nama.max' => 'Nama jenis cuti maksimal 50 karakter',
            'nama.unique' => 'Nama jenis cuti sudah digunakan',
            'jumlah_hari.required' => 'Jumlah hari wajib diisi',
            'jumlah_hari.integer' => 'Jumlah hari harus berupa angka',
            'jumlah_hari.min' => 'Jumlah hari minimal 1'
        ];
    }
}
