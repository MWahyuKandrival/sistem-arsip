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
            'tanggal_masuk' => $this->faker->dateTimeBetween('-5 years','now'),
            'sumber_arsip' => $this->faker->city(),
            'kode_klasifikasi' => $this->faker->postcode(),
            'uraian_informasi' => $this->faker->sentence(),
            'kurun_waktu' => $this->faker->dateTimeBetween("-4 years", "+4 years"),
            'jumlah' => mt_rand(1,3),
            'proses' => mt_rand(1,2) == 1? "Musnah":"Proses",
            'lokasi' => $this->faker->city(),
            'keterangan' => $this->faker->paragraph(),
            'file' => $this->faker->city().".txt",
        ];
    }
}
