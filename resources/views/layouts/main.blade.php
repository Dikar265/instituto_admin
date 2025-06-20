<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>    
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="container-fluid">      
      <nav class="navbar navbar-expand navbar-dark bg-dark">
        <h3 class="navbar-brand text-info" href="#">Blog</h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample02">
          <ul class="navbar-nav mr-auto">
            @section('menu')
           
  
            <li class="nav-item">
             <a class="nav-link" href="{{ route('carreras.index') }}">Carreras</a>
           </li>
    
            <li class="nav-item">
             <a class="nav-link" href="{{ route('materias.index') }}">Materias</a>
           </li>                      
            <li class="nav-item">
             <a class="nav-link" href="{{ route('alumnos.index') }}">Alumnos</a>
           </li>                 
           <li class="nav-item">
             <a class="nav-link" href="{{ route('examen.index') }}">Exámenes</a>
           </li>   
            <li class="nav-item">
             <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
           </li>               
             
           @show            
          </ul>
          <ul class="navbar-nav ml-auto"> 
           <li class="nav-item dropdown" hidden="hidden">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('noticias.idioma-lbl') }}
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('noticias.idioma', ['locale' => 'es']) }}">Español</a>
                <a class="dropdown-item" href="{{ route('noticias.idioma', ['locale' => 'en']) }}">English</a>
              </div>
                </li>    
                                   <li class="nav-item">
             <a class="nav-link" href="{{ route('etiquetas.index') }}">Etiquetas</a>
           </li>
                 <li class="nav-item ">
              <a class="nav-link" href="{{ route('noticias.index') }}">{{__('noticias.index')}}
                <span class="sr-only">(current)</span></a>
            </li>
        <li class="nav-item">
             <a class="nav-link  " href="{{ route('noticias.create') }}">{{__('noticias.nueva')}}</a>
           </li>         
                    
<!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('noticias.login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('noticias.register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('noticias.logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest            
           @show            
          </ul>          
        </div>
      </nav>
     <div class="jumbotron">

          @yield('content')
        </div>
      </div>
    </body>
</html>
