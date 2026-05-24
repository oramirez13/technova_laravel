<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sprint;

class TareaFactory extends Factory
{
    public function definition(): array
    {
        $sprint = Sprint::inRandomOrder()->first() ?: Sprint::factory()->create();

        return [
            'sprint_id' => $sprint->id,
            'titulo' => $this->faker->sentence(5),
            'descripcion' => $this->faker->paragraph(),
            'estado' => $this->faker->randomElement(['pendiente', 'en_progreso', 'completada']),
        ];
    }
}
