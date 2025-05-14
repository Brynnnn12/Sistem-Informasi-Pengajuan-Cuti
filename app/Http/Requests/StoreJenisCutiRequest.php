<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJenisCutiRequest extends FormRequest
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
            //
            'nama' => 'required|string|max:50',
            'jumlah_hari' => 'required|integer|min:0',
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
            'nama.required' => 'Nama jenis cuti harus diisi.',
            'nama.string' => 'Nama jenis cuti harus berupa teks.',
            'nama.max' => 'Nama jenis cuti tidak boleh lebih dari 50 karakter.',
            'jumlah_hari.required' => 'Jumlah hari cuti harus diisi.',
            'jumlah_hari.integer' => 'Jumlah hari cuti harus berupa angka.',
            'jumlah_hari.min' => 'Jumlah hari cuti tidak boleh kurang dari 0.',
        ];
    }
}
