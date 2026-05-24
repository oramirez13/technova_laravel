@extends('layouts.plantilla')

@section('title', trans('Inicio'))

@section('content')

    <div class="card">
        <div class="card-body text-center">
            <h1 class="card-title mt-3">{{ trans('Panel principal de TechNova Solutions') }}</h1>
            @auth
                <p class="card-text mt-3">
                    {{ trans('Sistema básico para administrar usuarios, proyectos, sprints, tareas y avances.') }}
                </p>
                <hr>
                <p class="card-text">
                    {{ trans('Usa el menú superior para registrar datos y consultar el estado actual del proyecto.') }}
                </p>
                <div class="mt-4">
                    <a href="{{ route('proyectos.index') }}" class="btn btn-principal m-2">{{ trans('Proyectos') }}</a>
                    <a href="{{ route('sprints.index') }}" class="btn btn-principal m-2">{{ trans('Sprints') }}</a>
                    <a href="{{ route('tareas.index') }}" class="btn btn-principal m-2">{{ trans('Tareas') }}</a>
                    <a href="{{ route('avances.index') }}" class="btn btn-principal m-2">{{ trans('Avances') }}</a>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-principal m-2">{{ trans('Usuarios') }}</a>
                </div>
            @else
                <p class="card-text mt-3">
                    {{ trans('Sistema básico para administrar usuarios, proyectos, sprints, tareas y avances.') }}
                </p>
                <hr>
                <p class="card-text">
                    {{ trans('Para entrar al panel primero debes iniciar sesión o registrar un usuario nuevo.') }}
                </p>
                <div class="mt-4">
                    <a href="{{ route('login') }}" class="btn btn-secundario m-2">{{ trans('Iniciar sesión') }}</a>
                    <a href="{{ route('register') }}" class="btn btn-principal m-2">{{ trans('Registrar nuevo usuario') }}</a>
                </div>
            @endauth
        </div>
    </div>

@endsection
