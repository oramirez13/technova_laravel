@extends('layouts.plantilla')

@section('title', trans('Editar Usuario'))

@section('content')

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ trans('Editar Usuario') }}</h4>

            <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">{{ trans('Nombre completo') }}</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $usuario->name) }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">{{ trans('Correo electrónico') }}</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $usuario->email) }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="rol">{{ trans('Rol') }}</label>
                    <select name="rol" id="rol" class="form-control">
                        <option value="administrador" @selected(old('rol', $usuario->rol) === 'administrador')>{{ trans('Administrador') }}</option>
                        <option value="desarrollador" @selected(old('rol', $usuario->rol) === 'desarrollador')>{{ trans('Desarrollador') }}</option>
                        <option value="analista" @selected(old('rol', $usuario->rol) === 'analista')>{{ trans('Analista') }}</option>
                        <option value="tester" @selected(old('rol', $usuario->rol) === 'tester')>{{ trans('Tester') }}</option>
                    </select>
                    @error('rol')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ trans('Nueva contraseña') }}</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <small class="form-text text-muted">{{ trans('Deja este campo vacío si no deseas cambiar la contraseña.') }}</small>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">{{ trans('Confirmar nueva contraseña') }}</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-principal">{{ trans('Actualizar Usuario') }}</button>
                <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-secundario">{{ trans('Cancelar') }}</a>
            </form>
        </div>
    </div>

@endsection
