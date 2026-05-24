<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Sprint;
use Illuminate\Http\Request;

class SprintController extends Controller
{
    public function index()
    {
        $sprints = Sprint::with('proyecto')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('sprints.index', compact('sprints'));
    }

    public function create()
    {
        $proyectos = Proyecto::orderBy('nombre')->get();

        return view('sprints.create', compact('proyectos'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:150',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'proyecto_id' => 'required|exists:proyectos,id',
        ]);

        $sprint = Sprint::create($datos);

        return redirect()->route('sprints.show', $sprint->id)
            ->with('success', 'Sprint guardado correctamente.');
    }

    public function show($id)
    {
        $sprint = Sprint::with('proyecto', 'tareas', 'avances')->findOrFail($id);

        return view('sprints.show', compact('sprint'));
    }

    public function edit($id)
    {
        $sprint = Sprint::findOrFail($id);
        $proyectos = Proyecto::orderBy('nombre')->get();

        return view('sprints.edit', compact('sprint', 'proyectos'));
    }

    public function update(Request $request, $id)
    {
        $sprint = Sprint::findOrFail($id);

        $datos = $request->validate([
            'nombre' => 'required|string|max:150',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'proyecto_id' => 'required|exists:proyectos,id',
        ]);

        $sprint->update($datos);

        return redirect()->route('sprints.show', $sprint->id)
            ->with('success', 'Sprint actualizado correctamente.');
    }

    public function destroy($id)
    {
        $sprint = Sprint::findOrFail($id);
        $sprint->delete();

        return redirect()->route('sprints.index')
            ->with('success', 'Sprint eliminado correctamente.');
    }
}
