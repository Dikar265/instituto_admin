<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/createBack.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend.css') }}">
    <!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--  <link rel="stylesheet" href="{{ asset('css/createBack.css') }}">  --}}
    <link rel="stylesheet" href="{{ asset('css/backend.css') }}">
    <!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <!-- SUMMERNOTE -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- SUMMERNOTE -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        $(".navbar .nav-link").on("click", function() {
            $(".navbar").find(".active").removeClass("active");
            $(this).addClass("active");
        });
    </script>
    @yield('scripts')
    <title>@yield('title')</title>
</head>

<body>

    <nav class="nav navbar navbar navbar-expand-lg bg-dark" style="background-color: #F5F5F5; color: white;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{ asset('img/logo.png') }}" width="30px" height="50px"
                    alt="" srcset=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav mr-auto">
                    @section('menu')
                        @if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 2)
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('turnos.index') }}">Turnos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('cupos.index') }}">Cupos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('espera.index') }}">Lista Espera</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white"
                                    href="{{ route('ir_admin', ['date' => '']) }}">Pre-inscriptos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('noticias.index') }}">Noticias</a>
                            </li>                            
                        @endif
                        @if (Auth::user()->is_admin == 1)
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('sede.index') }}">Sedes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('carrera.index') }}">Carreras</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('materia.index') }}">Materias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('comision.index') }}">Comisiones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('profesor.index') }}">Profesores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('modulo.index') }}">Módulos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('horario.index') }}">Horarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('programa.index') }}">Programas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('historia.index') }}">Historia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('objetivo.index') }}">Objetivos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('etiquetas.index') }}">Etiquetas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('users.index') }}">Usuarios</a>
                            </li>
                        @endif
                        @if (Auth::user()->is_admin == 1 || Auth::user()->is_admin == 3)
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('residuos.index') }}">Residuos</a>
                            </li>
                        @endif
                    @show

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    {{--  <a class="nav-link text-white"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>  --}}
                                </li>
                            @endif
                        @else
                            {{--  <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end bg-dark" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-white bg-dark" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <small>Cerrar Sesión</small>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>  --}}
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link text-white" href="{{ route('logout') }}"
                                    role="button"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <small> Cerrar Sesión [{{ Auth::user()->name }}]</small>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </a>

                            </li>
                        @endguest
                    </ul>
            </div>
    </nav>
    @yield('content')
    <style>
        .Inicio {
            text-align: center;
            margin: 20px;
            font-family: 'Quicksand', sans-serif;
            font-weight: 800;
            position: relative;
        }
    </style>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>

</html>
