<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Osvaldo Ramírez',
            'email' => 'orami@technova.cr',
            'rol' => 'administrador',
            'password' => Hash::make('Technova123'),
        ]);
    }
}
