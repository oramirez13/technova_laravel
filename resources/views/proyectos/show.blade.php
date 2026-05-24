@extends('layouts.plantilla')

@section('title', trans('Detalle del Proyecto'))

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ trans('Detalle del Proyecto') }}</h4>

            <p><strong>{{ trans('ID') }}:</strong> {{ $proyecto->id }}</p>
            <p><strong>{{ trans('Nombre') }}:</strong> {{ $proyecto->nombre }}</p>
            <p><strong>{{ trans('Descripción') }}:</strong> {{ $proyecto->descripcion }}</p>
            <p><strong>{{ trans('Estado') }}:</strong> {{ trans(ucfirst($proyecto->estado)) }}</p>
            <p><strong>{{ trans('Responsable') }}:</strong> {{ $proyecto->usuario->name }}</p>
            <p><strong>{{ trans('Total de sprints') }}:</strong> {{ $proyecto->sprints->count() }}</p>

            <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-principal">{{ trans('Editar') }}</a>
            <a href="{{ route('proyectos.index') }}" class="btn btn-secundario">{{ trans('Regresar') }}</a>
        </div>
    </div>

@endsection
