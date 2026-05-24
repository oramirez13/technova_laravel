<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sprint;
use App\Models\Proyecto;

class SprintSeeder extends Seeder
{
    public function run(): void
    {
        $proyectoId = Proyecto::first()->id;

        // Sprint 1
        $sprint1 = new Sprint();
        $sprint1->proyecto_id = $proyectoId;
        $sprint1->nombre = 'Sprint 1: Diseño de interfaz';
        $sprint1->fecha_inicio = '2026-05-01';
        $sprint1->fecha_fin = '2026-05-15';
        $sprint1->save();

        // Sprint 2
        $sprint2 = new Sprint();
        $sprint2->proyecto_id = $proyectoId;
        $sprint2->nombre = 'Sprint 2: Desarrollo del carrito';
        $sprint2->fecha_inicio = '2026-05-16';
        $sprint2->fecha_fin = '2026-05-31';
        $sprint2->save();

        Sprint::factory(20)->create();
    }
}
