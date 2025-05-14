<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisCuti extends Model
{
    /** @use HasFactory<\Database\Factories\JenisCutiFactory> */
    use HasFactory;
    protected $table = 'jenis_cutis';
    protected $guarded = ['id'];

    /**
     * Relasi dengan model pengajuanCuti
     */
    public function pengajuanCuti()
    {
        return $this->hasMany(PengajuanCuti::class, 'jenis_cuti_id');
    }
}
