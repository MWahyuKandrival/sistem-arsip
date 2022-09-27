<?php

namespace Database\Seeders;

use App\Models\Arsip;
use App\Models\Ruangan;
use App\Models\Rak;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Arsip::factory(33)->create();
        Ruangan::factory(5)->create();
        Rak::factory(10)->create();
    }
}
