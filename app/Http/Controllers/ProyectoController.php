<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    // Verifica que el usuario actual sea el responsable del proyecto o tenga rol privilegiado.
    private function verificarPermiso($proyecto)
    {
        $rol = Auth::user()->rol ?? '';
        $esPrivilegiado = in_array($rol, ['administrador', 'manager']);

        if (!$esPrivilegiado && $proyecto->user_id !== Auth::id()) {
            abort(403, 'No tienes permisos para gestionar este proyecto.');
        }
    }

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
            ->with('success', trans('Proyecto guardado correctamente.'));
    }

    public function show($id)
    {
        $proyecto = Proyecto::with('usuario', 'sprints')->findOrFail($id);
        $this->verificarPermiso($proyecto);

        return view('proyectos.show', compact('proyecto'));
    }

    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $this->verificarPermiso($proyecto);

        $usuarios = User::orderBy('name')->get();

        return view('proyectos.edit', compact('proyecto', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $this->verificarPermiso($proyecto);

        $datos = $request->validate([
            'nombre' => 'required|string|max:150',
            'descripcion' => 'required|string',
            'estado' => 'required|in:activo,pausado,completado',
            'user_id' => 'required|exists:users,id',
        ]);

        $proyecto->update($datos);

        return redirect()->route('proyectos.show', $proyecto->id)
            ->with('success', trans('Proyecto actualizado correctamente.'));
    }

    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $this->verificarPermiso($proyecto);

        $proyecto->delete();

        return redirect()->route('proyectos.index')
            ->with('success', trans('Proyecto eliminado correctamente.'));
    }
}
