@extends('layouts.plantilla')

@section('title', trans('Iniciar sesión'))

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ trans('Iniciar sesión') }}</h4>

                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ trans('Correo electrónico') }}</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
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

                        <button type="submit" class="btn btn-principal">{{ trans('Entrar') }}</button>
                        <a href="{{ route('register') }}" class="btn btn-secundario">{{ trans('Crear cuenta') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
