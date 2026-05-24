@extends('layouts.plantilla')

@section('title', trans('Detalle del Avance'))

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ trans('Detalle del Avance') }}</h4>

            <p><strong>{{ trans('ID') }}:</strong> {{ $avance->id }}</p>
            <p><strong>{{ trans('Descripción') }}:</strong> {{ $avance->descripcion }}</p>
            <p><strong>{{ trans('Horas trabajadas') }}:</strong> {{ $avance->horas }}</p>
            <p><strong>{{ trans('Fecha') }}:</strong> {{ $avance->fecha }}</p>
            <p><strong>{{ trans('Sprint') }}:</strong> {{ $avance->sprint->nombre }}</p>

            <a href="{{ route('avances.edit', $avance->id) }}" class="btn btn-principal">{{ trans('Editar') }}</a>
            <a href="{{ route('avances.index') }}" class="btn btn-secundario">{{ trans('Regresar') }}</a>
        </div>
    </div>

@endsection
