@extends('layouts.plantilla')

@section('title', trans('Detalle del Usuario'))

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ trans('Detalle del Usuario') }}</h4>

            <p><strong>{{ trans('ID') }}:</strong> {{ $usuario->id }}</p>
            <p><strong>{{ trans('Nombre') }}:</strong> {{ $usuario->name }}</p>
            <p><strong>{{ trans('Correo') }}:</strong> {{ $usuario->email }}</p>
            <p><strong>{{ trans('Rol') }}:</strong> {{ trans(ucfirst($usuario->rol)) }}</p>
            <p><strong>{{ trans('Total de proyectos asignados') }}:</strong> {{ $usuario->proyectos->count() }}</p>

            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-principal">{{ trans('Editar') }}</a>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secundario">{{ trans('Regresar') }}</a>
        </div>
    </div>

@endsection
