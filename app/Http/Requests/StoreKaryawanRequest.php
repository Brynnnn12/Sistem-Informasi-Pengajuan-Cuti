<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKaryawanRequest extends FormRequest
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
             * Validasi untuk menyimpan karyawan baru
             * Beberapa field dibuat nullable karena data akan diupdate oleh karyawan sendiri
             */
            'nama_lengkap' => 'nullable|string|max:50', // Tidak wajib diisi
            'nik' => 'nullable|string|max:20|unique:karyawans,nik', // Tidak wajib diisi
            'jabatan_id' => 'nullable|exists:jabatans,id', // Tidak wajib diisi
            'no_hp' => 'nullable|string|max:15', // Tidak wajib diisi
        ];
    }
}
