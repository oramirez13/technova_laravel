@extends('layouts.plantilla')

@section('title', trans('Usuarios'))

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title mb-0">{{ trans('Listado de Usuarios') }}</h4>
                <a href="{{ route('usuarios.create') }}" class="btn btn-principal">{{ trans('Nuevo Usuario') }}</a>
            </div>

            @if($usuarios->isEmpty())
                <p class="mb-0">{{ trans('Todavía no hay usuarios registrados.') }}</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ trans('ID') }}</th>
                                <th>{{ trans('Nombre') }}</th>
                                <th>{{ trans('Correo') }}</th>
                                <th>{{ trans('Rol') }}</th>
                                <th>{{ trans('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ trans(ucfirst($usuario->rol)) }}</td>
                                    <td class="col-acciones">
                                        <div class="d-flex flex-column gap-1">
                                            <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-secundario btn-xs w-100">{{ trans('Ver') }}</a>
                                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-principal btn-xs w-100">{{ trans('Editar') }}</a>
                                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="margin:0; padding:0;" onsubmit="return confirm('{{ trans('¿Confirma la eliminación de este registro?') }}');">
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
                    {{ $usuarios->links() }}
                </div>

            @endif
        </div>
    </div>

@endsection
