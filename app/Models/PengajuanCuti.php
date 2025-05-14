<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{
    /** @use HasFactory<\Database\Factories\PengajuanCutiFactory> */
    use HasFactory;
    protected $table = 'pengajuan_cutis';
    protected $guarded = ['id'];

    /**
     * Relasi dengan model Karyawan (Setiap Pengajuan Cuti dimiliki oleh satu Karyawan)
     */
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }

    /**
     * Relasi dengan model JenisCuti (Setiap Pengajuan Cuti mengacu pada satu Jenis Cuti)
     */
    public function jenisCuti()
    {
        return $this->belongsTo(JenisCuti::class, 'jenis_cuti_id');
    }
}
