@extends('layouts.plantilla')

@section('title', trans('Nuevo Proyecto'))

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ trans('Nuevo Proyecto') }}</h4>

            <form action="{{ route('proyectos.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nombre">{{ trans('Nombre del proyecto') }}</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}">
                    @error('nombre')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion">{{ trans('Descripción') }}</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="estado">{{ trans('Estado') }}</label>
                    <select name="estado" id="estado" class="form-control">
                        <option value="">{{ trans('Seleccione un estado') }}</option>
                        <option value="activo" @selected(old('estado') === 'activo')>{{ trans('Activo') }}</option>
                        <option value="pausado" @selected(old('estado') === 'pausado')>{{ trans('Pausado') }}</option>
                        <option value="completado" @selected(old('estado') === 'completado')>{{ trans('Completado') }}</option>
                    </select>
                    @error('estado')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="user_id">{{ trans('Responsable') }}</label>
                    <select name="user_id" id="user_id" class="form-control">
                        <option value="">{{ trans('Seleccione un usuario') }}</option>
                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" @selected((string) old('user_id') === (string) $usuario->id)>
                                {{ $usuario->name }} - {{ ucfirst($usuario->rol) }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-principal">{{ trans('Guardar Proyecto') }}</button>
                <a href="{{ route('proyectos.index') }}" class="btn btn-secundario">{{ trans('Cancelar') }}</a>
            </form>
        </div>
    </div>

@endsection
