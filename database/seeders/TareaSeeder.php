<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tarea;
use App\Models\Sprint;

class TareaSeeder extends Seeder
{
    public function run(): void
    {
        $sprintId = Sprint::first()->id;

        // Tarea 1
        $tarea1 = new Tarea();
        $tarea1->sprint_id = $sprintId;
        $tarea1->titulo = 'Crear wireframes de la pagina principal';
        $tarea1->descripcion = 'Diseño en Figma de la estructura visual del home.';
        $tarea1->estado = 'completada';
        $tarea1->save();

        // Tarea 2
        $tarea2 = new Tarea();
        $tarea2->sprint_id = $sprintId;
        $tarea2->titulo = 'Implementar navbar responsivo';
        $tarea2->descripcion = 'Barra de navegación con Bootstrap 5 adaptada a móvil.';
        $tarea2->estado = 'en_progreso';
        $tarea2->save();

        // Tarea 3
        $tarea3 = new Tarea();
        $tarea3->sprint_id = $sprintId;
        $tarea3->titulo = 'Configurar colores del sistema';
        $tarea3->descripcion = 'Definir variables CSS con la paleta de TechNova.';
        $tarea3->estado = 'pendiente';
        $tarea3->save();

        Tarea::factory(50)->create();
    }
}
