<?php

namespace Tests\Feature;

use App\Models\Proyecto;
use App\Models\Sprint;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_home_page_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('TechNova Solutions');
    }

    public function test_a_user_can_create_a_project(): void
    {
        $usuario = User::factory()->create();

        $this->actingAs($usuario);

        $response = $this->post('/proyectos', [
            'nombre' => 'Proyecto de prueba',
            'descripcion' => 'Descripcion del proyecto de prueba',
            'estado' => 'activo',
            'user_id' => $usuario->id,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('proyectos', [
            'nombre' => 'Proyecto de prueba',
            'user_id' => $usuario->id,
        ]);
    }

    public function test_a_user_can_create_a_task(): void
    {
        $usuario = User::factory()->create();
        $this->actingAs($usuario);

        $proyecto = Proyecto::factory()->create([
            'user_id' => $usuario->id,
        ]);
        $sprint = Sprint::factory()->create([
            'proyecto_id' => $proyecto->id,
        ]);

        $response = $this->post('/tareas', [
            'titulo' => 'Tarea de prueba',
            'descripcion' => 'Descripcion de prueba',
            'estado' => 'pendiente',
            'sprint_id' => $sprint->id,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('tareas', [
            'titulo' => 'Tarea de prueba',
            'sprint_id' => $sprint->id,
        ]);
    }
}
