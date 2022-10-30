<?php

namespace Database\Seeders;

use App\Models\Arsip;
use App\Models\Ruangan;
use App\Models\Rak;
use App\Models\User;
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
        
        Ruangan::factory(3)->create();
        Rak::factory(12)->create();
        Arsip::factory(10)->create();

        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'nip' => '12345',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('testes'),
        ]);
    }
}
