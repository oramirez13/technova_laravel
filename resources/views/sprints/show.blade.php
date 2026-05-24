@extends('layouts.plantilla')

@section('title', trans('Detalle del Sprint'))

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ trans('Detalle del Sprint') }}</h4>

            <p><strong>{{ trans('ID') }}:</strong> {{ $sprint->id }}</p>
            <p><strong>{{ trans('Nombre') }}:</strong> {{ $sprint->nombre }}</p>
            <p><strong>{{ trans('Fecha de inicio') }}:</strong> {{ $sprint->fecha_inicio }}</p>
            <p><strong>{{ trans('Fecha de fin') }}:</strong> {{ $sprint->fecha_fin }}</p>
            <p><strong>{{ trans('Proyecto') }}:</strong> {{ $sprint->proyecto->nombre }}</p>
            <p><strong>{{ trans('Total de tareas') }}:</strong> {{ $sprint->tareas->count() }}</p>
            <p><strong>{{ trans('Total de avances') }}:</strong> {{ $sprint->avances->count() }}</p>

            <a href="{{ route('sprints.edit', $sprint->id) }}" class="btn btn-principal">{{ trans('Editar') }}</a>
            <a href="{{ route('sprints.index') }}" class="btn btn-secundario">{{ trans('Regresar') }}</a>
        </div>
    </div>

@endsection
