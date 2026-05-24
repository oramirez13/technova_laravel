<?php

namespace Database\Seeders;

use App\Models\Avance;
use App\Models\Sprint;
use Illuminate\Database\Seeder;

class AvanceSeeder extends Seeder
{
    public function run(): void
    {
        $sprintId = Sprint::first()->id;

        $avance1 = new Avance();
        $avance1->sprint_id = $sprintId;
        $avance1->descripcion = 'Se completaron los wireframes de las vistas principales en Figma.';
        $avance1->horas = 4;
        $avance1->fecha = '2026-05-02';
        $avance1->save();

        $avance2 = new Avance();
        $avance2->sprint_id = $sprintId;
        $avance2->descripcion = 'Se implementó la barra de navegación con Bootstrap 5.';
        $avance2->horas = 3;
        $avance2->fecha = '2026-05-03';
        $avance2->save();

        Avance::factory(30)->create();
    }
}
