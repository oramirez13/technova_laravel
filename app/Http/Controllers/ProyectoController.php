<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::with('usuario')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        $usuarios = User::orderBy('name')->get();

        return view('proyectos.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:150',
            'descripcion' => 'required|string',
            'estado' => 'required|in:activo,pausado,completado',
            'user_id' => 'required|exists:users,id',
        ]);

        $proyecto = Proyecto::create($datos);

        return redirect()->route('proyectos.show', $proyecto->id)
            ->with('success', 'Proyecto guardado correctamente.');
    }

    public function show($id)
    {
        $proyecto = Proyecto::with('usuario', 'sprints')->findOrFail($id);

        return view('proyectos.show', compact('proyecto'));
    }

    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $usuarios = User::orderBy('name')->get();

        return view('proyectos.edit', compact('proyecto', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);

        $datos = $request->validate([
            'nombre' => 'required|string|max:150',
            'descripcion' => 'required|string',
            'estado' => 'required|in:activo,pausado,completado',
            'user_id' => 'required|exists:users,id',
        ]);

        $proyecto->update($datos);

        return redirect()->route('proyectos.show', $proyecto->id)
            ->with('success', 'Proyecto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto eliminado correctamente.');
    }
}
