<?php

namespace Database\Factories;

use App\Models\Sprint;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvanceFactory extends Factory
{
    public function definition(): array
    {
        $sprint = Sprint::inRandomOrder()->first() ?: Sprint::factory()->create();

        return [
            'sprint_id' => $sprint->id,
            'descripcion' => $this->faker->paragraph(),
            'horas' => $this->faker->numberBetween(1, 8),
            'fecha' => $this->faker->date(),
        ];
    }
}
