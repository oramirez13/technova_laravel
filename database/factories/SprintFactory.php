<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Proyecto;

class SprintFactory extends Factory
{
    public function definition(): array
    {
        $fechaInicio = $this->faker->dateTimeBetween('2026-01-01', '2026-06-01');

        $proyecto = Proyecto::inRandomOrder()->first() ?: Proyecto::factory()->create();

        return [
            'proyecto_id' => $proyecto->id,
            'nombre' => 'Sprint ' . $this->faker->numberBetween(1, 10) . ': ' . $this->faker->sentence(3),
            'fecha_inicio' => $fechaInicio->format('Y-m-d'),
            'fecha_fin' => $this->faker->dateTimeBetween($fechaInicio, '+21 days')->format('Y-m-d'),
        ];
    }
}
