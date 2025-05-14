<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JenisCuti>
 */
class JenisCutiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            /**
             * JenisCuti factory untuk mengisi data jenis cuti
             * pada tabel jenis_cuti
             * Menggunakan faker untuk menghasilkan data palsu
             * Menghasilkan nama cuti yang unik
             * Menghasilkan jumlah hari cuti yang acak antara 1 dan 7
             */
            'nama' => $this->faker->unique()->randomElement([
                'Cuti Tahunan',
                'Cuti Sakit',
                'Cuti Melahirkan',
                'Cuti Besar',
                'Cuti Pribadi',
                'Cuti Bersama',
                'Cuti Hamil',
                'Cuti Menikah',
                'Cuti Keluarga',
                'Cuti Khusus',
                'Cuti Dinas',
                'Cuti Liburan',
            ]), // Menghasilkan nama cuti yang unik
            'jumlah_hari' => $this->faker->numberBetween(1, 7), // Menghasilkan jumlah hari cuti yang acak antara 1 dan 7
        ];
    }
}
