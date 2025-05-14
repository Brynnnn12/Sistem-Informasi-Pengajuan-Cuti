<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jabatan>
 */
class JabatanFactory extends Factory
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
             * Jabatan factory untuk mengisi data jabatan
             * pada tabel jabatan
             * Menggunakan faker untuk menghasilkan data palsu
             */
            'nama' => $this->faker->unique()->jobTitle(), // Menghasilkan nama jabatan yang unik

        ];
    }
}
