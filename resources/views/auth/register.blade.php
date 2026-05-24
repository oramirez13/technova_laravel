@extends('layouts.plantilla')

@section('title', trans('Registro'))

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ trans('Registrar nuevo usuario') }}</h4>

                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ trans('Nombre completo') }}</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ trans('Correo electrónico') }}</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="rol">{{ trans('Rol') }}</label>
                            <select name="rol" id="rol" class="form-control">
                                <option value="">{{ trans('Seleccione un rol') }}</option>
                                <option value="administrador" @selected(old('rol') === 'administrador')>{{ trans('Administrador') }}</option>
                                <option value="desarrollador" @selected(old('rol') === 'desarrollador')>{{ trans('Desarrollador') }}</option>
                                <option value="analista" @selected(old('rol') === 'analista')>{{ trans('Analista') }}</option>
                                <option value="tester" @selected(old('rol') === 'tester')>{{ trans('Tester') }}</option>
                            </select>
                            @error('rol')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ trans('Contraseña') }}</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">{{ trans('Confirmar contraseña') }}</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-principal">{{ trans('Registrar usuario') }}</button>
                        <a href="{{ route('login') }}" class="btn btn-secundario">{{ trans('Ya tengo cuenta') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
