<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class ProyectoFactory extends Factory
{
    public function definition(): array
    {
        $user = User::inRandomOrder()->first() ?: User::factory()->create();

        return [ 
            'user_id' => $user->id,
            'nombre' => $this->faker->sentence(4),
            'descripcion' => $this->faker->paragraph(),
            'estado' => $this->faker->randomElement(['activo', 'pausado', 'completado']),
        ];
    }
}
