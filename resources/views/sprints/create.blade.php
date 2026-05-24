@extends('layouts.plantilla')

@section('title', trans('Nuevo Sprint'))

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ trans('Nuevo Sprint') }}</h4>

            <form action="{{ route('sprints.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nombre">{{ trans('Nombre del sprint') }}</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}">
                    @error('nombre')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fecha_inicio">{{ trans('Fecha de inicio') }}</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ old('fecha_inicio') }}">
                    @error('fecha_inicio')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fecha_fin">{{ trans('Fecha de fin') }}</label>
                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ old('fecha_fin') }}">
                    @error('fecha_fin')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="proyecto_id">{{ trans('Proyecto') }}</label>
                    <select name="proyecto_id" id="proyecto_id" class="form-control">
                        <option value="">{{ trans('Seleccione un proyecto') }}</option>
                        @foreach($proyectos as $proyecto)
                            <option value="{{ $proyecto->id }}" @selected((string) old('proyecto_id') === (string) $proyecto->id)>
                                {{ $proyecto->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('proyecto_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-principal">{{ trans('Guardar Sprint') }}</button>
                <a href="{{ route('sprints.index') }}" class="btn btn-secundario">{{ trans('Cancelar') }}</a>
            </form>
        </div>
    </div>

@endsection
