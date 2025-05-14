<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateJabatanRequest extends FormRequest
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
            /**
             * Validasi untuk memperbarui jabatan
             */
            'nama' => [
                'required',
                'string',
                'min:3',
                'max:50',
                Rule::unique('jabatans', 'nama')->ignore($this->route('jabatan'))
            ],
        ];
    }
    public function messages()
    {
        return [
            'nama.required' => 'Nama jabatan harus diisi.',
            'nama.string' => 'Nama jabatan harus berupa string.',
            'nama.min' => 'Nama jabatan harus terdiri dari minimal 3 karakter.',
            'nama.max' => 'Nama jabatan tidak boleh lebih dari 50 karakter.',
            'nama.unique' => 'Nama jabatan sudah ada.',
        ];
    }
}
