<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArsipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_file' => $this->faker->sentence(),
            'sumber_arsip' => $this->faker->city(),
            'kode_klasifikasi' => $this->faker->postcode(),
            'proses' => mt_rand(1,2) == 1? "Musnah":"Proses",
            'ruangan_id' => mt_rand(1,2),
            'rak_id' => mt_rand(1,4),
            'keterangan' => $this->faker->paragraph(),
            // 'file' => $this->faker->city().".txt",
        ];
    }
}
