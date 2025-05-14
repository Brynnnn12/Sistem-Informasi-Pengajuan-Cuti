<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKaryawanRequest extends FormRequest
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
             * Validasi untuk memperbarui data karyawan
             * Semua field diwajibkan saat update
             */
            'nama_lengkap' => 'required|string|max:50', // Wajib diisi
            'nip' => 'required|string|max:20|unique:karyawans,nip,' . $this->route('karyawan'), // Wajib diisi, kecuali milik karyawan yang sedang diupdate
            'jabatan_id' => 'required|exists:jabatans,id', // Wajib diisi
            'no_hp' => 'required|string|max:15', // Wajib diisi
        ];
    }
}
