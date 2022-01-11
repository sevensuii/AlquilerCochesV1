<?php

namespace Database\Seeders;

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
        \App\Models\Cliente::factory(200)->create();
        \App\Models\Coche::factory(100)->create();
        \App\Models\Alquiler::factory(400)->create();
    }
}
