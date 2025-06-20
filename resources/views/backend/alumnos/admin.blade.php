@extends('backend.layouts.main')

<link rel="shortcut icon" type="image/png" href="{{ asset('/img/logo1.png') }}">
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">

<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

<!-- Datatables injected-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Styles -->
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="js/main2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

@section('title', 'Inscripciones')
@section('content')

    <br>
    @if (session('mensaje2'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Atención!</strong> {{ session('mensaje2') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container-fluid">

        <div class="row mx-auto p-3 bg-light">
            {{--  <div class="d-flex">  --}}

            {{--  <a href="{{ route('espera.create') }}"><button type="button" class="btn btn-primary me-2">Preinscriptos de
                        Hoy</button></a>
                <a href="{{ route('espera.index') }}"><button type="button" class="btn btn-primary">Todos</button></a>  --}}
            {{--  </div>  --}}

            {{ Form::open(['route' => 'ir_admin_post', 'method' => 'POST']) }}
            <div class="card-body">
                {{--  @csrf  --}}
                <div class="input-group mb-3">
                    <a href="{{ route('ir_admin') }}"><button type="button" class="btn btn-success me-2">
                            Hoy</button></a>
                  <!-- <a href="{{ route('errores') }}" target="_blank"><button type="button" class="btn btn-danger me-2">
                            Sin Datos</button></a>       -->                       
                    <a href="{{ route('inscripcion', 'admin') }}"><button type="button" class="btn btn-danger me-2">
                            Sin Turno</button></a>
                    <a href="{{ route('ir_admin', 'todos') }}"><button type="button" class="btn btn-primary me-2">
                            Todos</button></a>                                
                    <div class=" mx-4"></div>
                    <div class="input-group-text">
                        {{ Form::label('dni', 'DNI', ['class' => 'control-label']) }}
                    </div>
                    {{ Form::number('dni', old('dni'), ['class' => 'form-control col-4', 'placeholder' => '']) }}
                    <div class="input-group-text">
                        {{ Form::label('fecha', 'Fecha', ['class' => 'control-label']) }}
                    </div>
                    {{ Form::date('fecha', old('fecha'), ['class' => 'form-control col-5', 'placeholder' => '']) }}
                    <div class="input-group-text">
                        {{ Form::label('carrera_id', 'Carrera', ['class' => 'control-label']) }}
                    </div>
                    {{ Form::select('carrera_id', $carreras_sel, null, ['class' => 'form-control', 'placeholder' => '']) }}
                    <button type="submit" class="btn btn-primary me-2">
                        Buscar
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </div>
                @error('dni')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                {!! Form::close() !!}
            </div>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                    role="tab" aria-controls="home" aria-selected="true">Pre-Inscriptos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                    role="tab" aria-controls="profile" aria-selected="false">Documentación</button>
            </li>
            {{-- <li class="nav-item" role="presentation">
                       <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Entregado</button>
                    </li> --}}
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                {{--  <h3>Pre-inscriptos</h3>  --}}
                @include('backend/alumnos/partials/admin/tabla_registros')
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                {{--  <h3>Falta Entregar</h3>  --}}
                @include('backend/alumnos/partials/admin/tabla_registros_doc')

            </div>

        </div>

    </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="js/main.js"></script>
    <script src="js/admin.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script></script>

@endsection
