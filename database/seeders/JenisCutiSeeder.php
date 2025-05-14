<?php

namespace Database\Seeders;

use App\Models\JenisCuti;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisCutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        /**
         * JenisCuti seeder untuk mengisi data jenis cuti
         * pada tabel jenis_cuti
         * Menggunakan factory untuk menghasilkan data palsu
         * Menggunakan 10 data jenis cuti
         */
        JenisCuti::factory()->count(10)->create();
    }
}
