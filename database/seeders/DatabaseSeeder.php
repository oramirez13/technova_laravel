<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            \Database\Seeders\UserSeeder::class,
            \Database\Seeders\ProyectoSeeder::class,
            \Database\Seeders\SprintSeeder::class,
            \Database\Seeders\TareaSeeder::class,
            \Database\Seeders\AvanceSeeder::class,
        ]);
    }
}
