<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Jabatan seeder untuk mengisi data jabatan
         * pada tabel jabatan
         * Menggunakan factory untuk menghasilkan data palsu
         * Menggunakan 10 data jabatan
         */
        Jabatan::factory()->count(10)->create();
    }
}
