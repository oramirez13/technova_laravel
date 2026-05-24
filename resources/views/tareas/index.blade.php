@extends('layouts.plantilla')

@section('title', trans('Tareas'))

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title mb-0">{{ trans('Listado de Tareas') }}</h4>
                <a href="{{ route('tareas.create') }}" class="btn btn-principal">{{ trans('Nueva Tarea') }}</a>
            </div>

            @if($tareas->isEmpty())
                <p class="mb-0">{{ trans('Todavía no hay tareas registradas.') }}</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ trans('ID') }}</th>
                                <th>{{ trans('Titulo') }}</th>
                                <th>{{ trans('Estado') }}</th>
                                <th>{{ trans('Sprint') }}</th>
                                <th>{{ trans('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tareas as $tarea)
                                <tr>
                                    <td>{{ $tarea->id }}</td>
                                    <td>{{ $tarea->titulo }}</td>
                                    <td>{{ $tarea->estado === 'pendiente' ? trans('Pendiente') : ($tarea->estado === 'en_progreso' ? trans('En progreso') : trans('Completada')) }}</td>
                                    <td>{{ $tarea->sprint->nombre }}</td>
                                    <td class="col-acciones">
                                        <div class="d-flex flex-column gap-1">
                                            <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-secundario btn-xs w-100">{{ trans('Ver') }}</a>
                                            <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-principal btn-xs w-100">{{ trans('Editar') }}</a>
                                            <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" style="margin:0; padding:0;" onsubmit="return confirm('¿Confirma la eliminación de este registro?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-xs w-100">{{ trans('Eliminar') }}</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $tareas->links() }}
                </div>

            @endif
        </div>
    </div>

@endsection
