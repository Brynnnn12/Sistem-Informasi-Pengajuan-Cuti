<?php

namespace App\Http\Requests;

use App\Models\JenisCuti;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StorePengajuanCutiRequest extends FormRequest
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
            'jenis_cuti_id' => 'required|exists:jenis_cutis,id',
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_selesai' => [
                'required',
                'date',
                'after_or_equal:tanggal_mulai',
                function ($attribute, $value, $fail) {
                    $validated = $this->validated();
                    $jenisCuti = JenisCuti::find($validated['jenis_cuti_id']); // Gunakan validated() untuk mengakses data
                    if ($jenisCuti) {
                        $tanggalMulai = Carbon::parse($validated['tanggal_mulai']); // Gunakan validated() untuk mengakses data
                        $tanggalSelesai = Carbon::parse($value);
                        $jumlahHariCuti = $tanggalMulai->diffInDays($tanggalSelesai) + 1;

                        if ($jumlahHariCuti > $jenisCuti->jumlah_hari) {
                            $fail('Jumlah hari cuti tidak boleh lebih dari ' . $jenisCuti->jumlah_hari . ' hari.');
                        }
                    }
                },
            ],
            'alasan' => 'required|string|max:255',
            'lampiran_keterangan' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ];
    }
    /**
     * Get the validation error messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'jenis_cuti_id.required' => 'Jenis cuti harus dipilih.',
            'jenis_cuti_id.exists' => 'Jenis cuti yang dipilih tidak valid.',
            'tanggal_mulai.required' => 'Tanggal mulai harus diisi.',
            'tanggal_mulai.date' => 'Tanggal mulai harus berupa tanggal yang valid.',
            'tanggal_mulai.after_or_equal' => 'Tanggal mulai harus setelah atau sama dengan hari ini.',
            'tanggal_selesai.required' => 'Tanggal selesai harus diisi.',
            'tanggal_selesai.date' => 'Tanggal selesai harus berupa tanggal yang valid.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
            'tanggal_selesai.after' => 'Tanggal selesai harus setelah tanggal mulai.',
            'tanggal_selesai.different' => 'Tanggal selesai tidak boleh sama dengan tanggal mulai.',
            'alasan.required' => 'Alasan harus diisi.',
            'alasan.string' => 'Alasan harus berupa string.',
            'alasan.max' => 'Alasan tidak boleh lebih dari 255 karakter.',
            'lampiran_keterangan.required' => 'Lampiran keterangan harus diunggah.',
            'lampiran_keterangan.file' => 'Lampiran keterangan harus berupa file.',
            'lampiran_keterangan.mimes' => 'Lampiran keterangan harus berupa file dengan format pdf, jpg, jpeg, atau png.',
            'lampiran_keterangan.max' => 'Lampiran keterangan tidak boleh lebih dari 2MB.',
        ];
    }
}
