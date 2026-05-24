@extends('layouts.plantilla')
@section('title', trans('Proyectos'))
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title mb-0">{{ trans('Listado de Proyectos') }}</h4>
                <a href="{{ route('proyectos.create') }}" class="btn btn-principal">{{ trans('Nuevo Proyecto') }}</a>
            </div>
            @if($proyectos->isEmpty())
                <p class="mb-0">{{ trans('Todavia no hay proyectos registrados.') }}</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ trans('ID') }}</th>
                                <th>{{ trans('Nombre') }}</th>
                                <th>{{ trans('Estado') }}</th>
                                <th>{{ trans('Responsable') }}</th>
                                <th>{{ trans('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proyectos as $proyecto)
                                <tr>
                                    <td>{{ $proyecto->id }}</td>
                                    <td>{{ $proyecto->nombre }}</td>
                                    <td>{{ trans(ucfirst($proyecto->estado)) }}</td>
                                    <td>{{ $proyecto->usuario->name }}</td>
                                    <td class="col-acciones">
                                        <div class="d-flex flex-column gap-1">
                                            <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-secundario btn-xs w-100">{{ trans('Ver') }}</a>
                                            <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-principal btn-xs w-100">{{ trans('Editar') }}</a>
                                            <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" style="margin:0; padding:0;" onsubmit="return confirm('¿Confirma la eliminación de este registro?');">
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
                    {{ $proyectos->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection