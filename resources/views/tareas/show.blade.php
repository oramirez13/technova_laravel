@extends('layouts.plantilla')

@section('title', trans('Detalle de la Tarea'))

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ trans('Detalle de la Tarea') }}</h4>

            <p><strong>{{ trans('ID') }}:</strong> {{ $tarea->id }}</p>
            <p><strong>{{ trans('Titulo') }}:</strong> {{ $tarea->titulo }}</p>
            <p><strong>{{ trans('Descripción') }}:</strong> {{ $tarea->descripcion }}</p>
            <p><strong>{{ trans('Estado') }}:</strong> {{ $tarea->estado === 'pendiente' ? trans('Pendiente') : ($tarea->estado === 'en_progreso' ? trans('En progreso') : trans('Completada')) }}</p>
            <p><strong>{{ trans('Sprint') }}:</strong> {{ $tarea->sprint->nombre }}</p>

            <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-principal">{{ trans('Editar') }}</a>
            <a href="{{ route('tareas.index') }}" class="btn btn-secundario">{{ trans('Regresar') }}</a>
        </div>
    </div>

@endsection
