<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;
use App\Models\User;

class ProyectoSeeder extends Seeder
{
    public function run(): void
    {
        // Proyecto 1
        $proyecto1 = new Proyecto();
        $proyecto1->user_id = User::first()->id;
        $proyecto1->nombre = 'Portal e-commerce cliente A';
        $proyecto1->descripcion = 'Desarrollo de tienda en línea con carrito de compras y pasarela de pagos.';
        $proyecto1->estado = 'activo';
        $proyecto1->save();

        // Proyecto 2
        $proyecto2 = new Proyecto();
        $proyecto2->user_id = User::first()->id;
        $proyecto2->nombre = 'API de pagos internos';
        $proyecto2->descripcion = 'Integración de módulo de pagos con proveedor externo.';
        $proyecto2->estado = 'pausado';
        $proyecto2->save();

        // Proyecto 3
        $proyecto3 = new Proyecto();
        $proyecto3->user_id = User::first()->id;
        $proyecto3->nombre = 'Rediseño de dashboard';
        $proyecto3->descripcion = 'Mejora visual e interactiva del panel principal de la plataforma.';
        $proyecto3->estado = 'completado';
        $proyecto3->save();

        Proyecto::factory(10)->create();
    }
}
