@extends('layouts.plantilla')

@section('title', trans('Sprints'))

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title mb-0">{{ trans('Listado de Sprints') }}</h4>
                <a href="{{ route('sprints.create') }}" class="btn btn-principal">{{ trans('Nuevo Sprint') }}</a>
            </div>

            @if($sprints->isEmpty())
                <p class="mb-0">{{ trans('Todavía no hay sprints registrados.') }}</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ trans('ID') }}</th>
                                <th>{{ trans('Nombre') }}</th>
                                <th>{{ trans('Fecha Inicio') }}</th>
                                <th>{{ trans('Fecha Fin') }}</th>
                                <th>{{ trans('Proyecto') }}</th>
                                <th>{{ trans('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sprints as $sprint)
                                <tr>
                                    <td>{{ $sprint->id }}</td>
                                    <td>{{ $sprint->nombre }}</td>
                                    <td>{{ $sprint->fecha_inicio }}</td>
                                    <td>{{ $sprint->fecha_fin }}</td>
                                    <td>{{ $sprint->proyecto->nombre }}</td>
                                    <td class="col-acciones">
                                        <div class="d-flex flex-column gap-1">
                                            <a href="{{ route('sprints.show', $sprint->id) }}" class="btn btn-secundario btn-xs w-100">{{ trans('Ver') }}</a>
                                            <a href="{{ route('sprints.edit', $sprint->id) }}" class="btn btn-principal btn-xs w-100">{{ trans('Editar') }}</a>
                                            <form action="{{ route('sprints.destroy', $sprint->id) }}" method="POST" style="margin:0; padding:0;" onsubmit="return confirm('{{ trans('¿Confirma la eliminación de este registro?') }}');">
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
                    {{ $sprints->links() }}
                </div>

            @endif
        </div>
    </div>

@endsection
