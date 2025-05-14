<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    /** @use HasFactory<\Database\Factories\JabatanFactory> */
    use HasFactory;
    protected $table = 'jabatans';
    protected $guarded = ['id'];
    /**
     * Relasi dengan model Pegawai
     */
    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'jabatan_id');
    }
}
