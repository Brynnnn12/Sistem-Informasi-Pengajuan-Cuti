<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    /** @use HasFactory<\Database\Factories\KaryawanFactory> */
    use HasFactory;
    protected $table = 'karyawans';
    protected $guarded = ['id'];

    /**
     * Relasi dengan model User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Relasi dengan model Jabatan
     */
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    /**
     * Relasi dengan model Pengajuan Cuti
     */
    public function pengajuanCuti()
    {
        return $this->hasMany(PengajuanCuti::class, 'karyawan_id');
    }
}
