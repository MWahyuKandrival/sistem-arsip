<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => mt_rand(1,10),
            'ruangan_id' => mt_rand(1,2),
        ];
    }
}
