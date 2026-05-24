<?php

namespace App\Http\Controllers;

use App\Models\Avance;
use App\Models\Sprint;
use Illuminate\Http\Request;

class AvanceController extends Controller
{
    public function index()
    {
        $avances = Avance::with('sprint')
            ->orderBy('fecha', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('avances.index', compact('avances'));
    }

    public function create()
    {
        $sprints = Sprint::orderBy('nombre')->get();

        return view('avances.create', compact('sprints'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'descripcion' => 'required|string',
            'horas' => 'required|integer|min:1|max:24',
            'fecha' => 'required|date',
            'sprint_id' => 'required|exists:sprints,id',
        ]);

        $avance = Avance::create($datos);

        return redirect()->route('avances.show', $avance->id)
            ->with('success', 'Avance guardado correctamente.');
    }

    public function show($id)
    {
        $avance = Avance::with('sprint')->findOrFail($id);

        return view('avances.show', compact('avance'));
    }

    public function edit($id)
    {
        $avance = Avance::findOrFail($id);
        $sprints = Sprint::orderBy('nombre')->get();

        return view('avances.edit', compact('avance', 'sprints'));
    }

    public function update(Request $request, $id)
    {
        $avance = Avance::findOrFail($id);

        $datos = $request->validate([
            'descripcion' => 'required|string',
            'horas' => 'required|integer|min:1|max:24',
            'fecha' => 'required|date',
            'sprint_id' => 'required|exists:sprints,id',
        ]);

        $avance->update($datos);

        return redirect()->route('avances.show', $avance->id)
            ->with('success', 'Avance actualizado correctamente.');
    }

    public function destroy($id)
    {
        $avance = Avance::findOrFail($id);
        $avance->delete();

        return redirect()->route('avances.index')
            ->with('success', 'Avance eliminado correctamente.');
    }
}
