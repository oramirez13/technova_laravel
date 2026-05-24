<?php

namespace App\Http\Controllers;

use App\Models\Sprint;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::with('sprint')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('tareas.index', compact('tareas'));
    }

    public function create()
    {
        $sprints = Sprint::orderBy('nombre')->get();

        return view('tareas.create', compact('sprints'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'titulo' => 'required|string|max:200',
            'descripcion' => 'required|string',
            'estado' => 'required|in:pendiente,en_progreso,completada',
            'sprint_id' => 'required|exists:sprints,id',
        ]);

        $tarea = Tarea::create($datos);

        return redirect()->route('tareas.show', $tarea->id)
            ->with('success', trans('Tarea guardada correctamente.'));
    }

    public function show($id)
    {
        $tarea = Tarea::with('sprint')->findOrFail($id);

        return view('tareas.show', compact('tarea'));
    }

    public function edit($id)
    {
        $tarea = Tarea::findOrFail($id);
        $sprints = Sprint::orderBy('nombre')->get();

        return view('tareas.edit', compact('tarea', 'sprints'));
    }

    public function update(Request $request, $id)
    {
        $tarea = Tarea::findOrFail($id);

        $datos = $request->validate([
            'titulo' => 'required|string|max:200',
            'descripcion' => 'required|string',
            'estado' => 'required|in:pendiente,en_progreso,completada',
            'sprint_id' => 'required|exists:sprints,id',
        ]);

        $tarea->update($datos);

        return redirect()->route('tareas.show', $tarea->id)
            ->with('success', trans('Tarea actualizada correctamente.'));
    }

    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();

        return redirect()->route('tareas.index')
            ->with('success', trans('Tarea eliminada correctamente.'));
    }
}
