@extends('layouts.plantilla')

@section('title', trans('Avances'))

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title mb-0">{{ trans('Listado de Avances') }}</h4>
                <a href="{{ route('avances.create') }}" class="btn btn-principal">{{ trans('Nuevo Avance') }}</a>
            </div>

            @if($avances->isEmpty())
                <p class="mb-0">{{ trans('Todavía no hay avances registrados.') }}</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ trans('ID') }}</th>
                                <th>{{ trans('Descripción') }}</th>
                                <th>{{ trans('Horas') }}</th>
                                <th>{{ trans('Fecha') }}</th>
                                <th>{{ trans('Sprint') }}</th>
                                <th>{{ trans('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($avances as $avance)
                                <tr>
                                    <td>{{ $avance->id }}</td>
                                    <td>{{ $avance->descripcion }}</td>
                                    <td>{{ $avance->horas }}</td>
                                    <td>{{ $avance->fecha }}</td>
                                    <td>{{ $avance->sprint->nombre }}</td>
                                    <td class="col-acciones">
                                        <div class="d-flex flex-column gap-1">
                                            <a href="{{ route('avances.show', $avance->id) }}" class="btn btn-secundario btn-xs w-100">{{ trans('Ver') }}</a>
                                            <a href="{{ route('avances.edit', $avance->id) }}" class="btn btn-principal btn-xs w-100">{{ trans('Editar') }}</a>
                                            <form action="{{ route('avances.destroy', $avance->id) }}" method="POST" style="margin:0; padding:0;" onsubmit="return confirm('¿Confirma la eliminación de este registro?');">
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
                    {{ $avances->links() }}
                </div>

            @endif
        </div>
    </div>

@endsection
