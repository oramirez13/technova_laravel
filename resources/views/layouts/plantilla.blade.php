<!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title') | {{ trans('TechNova Solutions') }}</title>

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous"
        />

        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="{{ url('/') }}">{{ trans('TechNova Solutions') }}</a>

            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNav"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('proyectos.index') }}">{{ trans('Proyectos') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sprints.index') }}">{{ trans('Sprints') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tareas.index') }}">{{ trans('Tareas') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('avances.index') }}">{{ trans('Avances') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('usuarios.index') }}">{{ trans('Usuarios') }}</a>
                        </li>
                    @endauth
                </ul>

                <div class="d-flex align-items-center ml-2">
                    @auth
                        <span class="text-white mr-3">{{ auth()->user()->name }}</span>

                        <form action="{{ route('logout') }}" method="POST" class="mr-3">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-secundario">
                                {{ trans('Cerrar sesión') }}
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-sm btn-secundario mr-2">
                            {{ trans('Iniciar sesión') }}
                        </a>

                        <a href="{{ route('register') }}" class="btn btn-sm btn-principal mr-3">
                            {{ trans('Registrarse') }}
                        </a>
                    @endauth

                    <a href="{{ route('idioma.cambiar', 'es') }}"
                        class="btn btn-sm mr-2 {{ app()->getLocale() == 'es' ? 'btn-principal' : 'btn-secundario' }}">
                        ES
                    </a>

                    <a href="{{ route('idioma.cambiar', 'en') }}"
                        class="btn btn-sm {{ app()->getLocale() == 'en' ? 'btn-principal' : 'btn-secundario' }}">
                        EN
                    </a>
                </div>
            </div>
        </nav>

        <div class="container mt-4">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>

        <script
            src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"
        ></script>

        <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>

    </body>

</html>
