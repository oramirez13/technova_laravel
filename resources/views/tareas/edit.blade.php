@extends('layouts.plantilla')

@section('title', trans('Editar Tarea'))

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ trans('Editar Tarea') }}</h4>

            <form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="titulo">{{ trans('Título de la tarea') }}</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $tarea->titulo) }}">
                    @error('titulo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion">{{ trans('Descripción') }}</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion', $tarea->descripcion) }}</textarea>
                    @error('descripcion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="estado">{{ trans('Estado') }}</label>
                    <select name="estado" id="estado" class="form-control">
                        <option value="pendiente" @selected(old('estado', $tarea->estado) === 'pendiente')>{{ trans('Pendiente') }}</option>
                        <option value="en_progreso" @selected(old('estado', $tarea->estado) === 'en_progreso')>{{ trans('En progreso') }}</option>
                        <option value="completada" @selected(old('estado', $tarea->estado) === 'completada')>{{ trans('Completada') }}</option>
                    </select>
                    @error('estado')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sprint_id">{{ trans('Sprint') }}</label>
                    <select name="sprint_id" id="sprint_id" class="form-control">
                        @foreach($sprints as $sprint)
                            <option value="{{ $sprint->id }}" @selected((string) old('sprint_id', $tarea->sprint_id) === (string) $sprint->id)>
                                {{ $sprint->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('sprint_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-principal">{{ trans('Actualizar Tarea') }}</button>
                <a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-secundario">{{ trans('Cancelar') }}</a>
            </form>
        </div>
    </div>

@endsection
