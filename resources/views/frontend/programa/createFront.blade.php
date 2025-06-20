@extends('frontend.layout.main')
@section('title', 'Programas')

@section('content')
<style>
    .Inicio {
        text-align: center;
        margin: 20px;
        color: white;
        font-family: 'Quicksand', sans-serif;
        font-weight: 800;
        position: relative;
    }



    .links {
        padding: 25px;
        width: 70%;
        height: 50%;
        margin: 0 auto;
    }

    .form-group {
        margin-top: 10px;
        justify-content: center;
    }

    .form-group label {
        color: white;
        outline: none;
        margin-bottom: 5px;
        font-family: 'Quicksand', sans-serif;
        font-weight: 800;
        font-size: 20px;
    }

    .form-control {
        border: 1px solid gray;
        padding: 10px;
        outline: none;
    }


    .volver {
        margin-left: 600px;
        margin-right: 600px;
        background-color: #019267;
        border-radius: 10px;
        font-family: 'Quicksand', sans-serif;

    }

    .form-check {
        color: white;
    }
</style>
<div class="Inicio">
    <h1 class="TextoInicio">Nuevo Programa</h1>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profesores</h5>

            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Usuario</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Contraseña</label>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary">Ingresar</button>
            </div>
        </div>
    </div>
</div>

<div>
    @if(Session::has('status'))
    <div class="alert alert-success">{{ Session('status')}}</div>
    @endif
    @if(Session::has('status-error'))
    <div class="alert alert-danger">{{ Session('status-error')}}</div>
    @endif
</div>
<div class="links">
    <div class="d-grid gap-2 d-md-flex" style="justify-content: center;">
        <a href="{{route('programas')}}"><button class="btn btn-primary me-md-3" type="button">Listado de programas</button></a>
        <a href="/"><button class="btn btn-primary" type="button">Plantilla para programas</button></a>
    </div>

    {{ Form::open(['route' => 'programas.store', 'files' => true]) }}
    @csrf
    <!-- {{ csrf_field() }} -->
    <div class="form-group">
        {{ Form::label("sede_id", __('SEDE'), ['class' => 'control-label']) }}
        {{Form::select("sede_id", $sede, null, ["class" => "form-control", "placeholder" => "Seleccione una sede"]) }}
        @error('sede_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label("carrera_id", __('CARRERA'), ['class' => 'control-label']) }}
        {{Form::select("carrera_id", $carreras, null, ["class" => "form-control", "placeholder" => "Seleccione una sede"]) }}
        @error('carrera_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label("anio_id", __('AÑOS'), ['class' => 'control-label']) }}
        {{Form::select("anio_id", $anios, null, ["class" => "form-control", "placeholder" => "Seleccione un año"]) }}
        @error('anio_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        {{ Form::label("materia_id", __('MATERIAS'), ['class' => 'control-label']) }}
        {{Form::select("materia_id", $materias, null, ["class" => "form-control", "placeholder" => "Seleccione una materia"]) }}
        @error('materia_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label("comision_id", __('COMISIONES'), ['class' => 'control-label']) }}
        {{Form::select("comision_id", $comisiones, null, ["class" => "form-control", "placeholder" => "Seleccione una comision"]) }}
        @error('comision_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label("profesor_id", __('PROFESORES'), ['class' => 'control-label']) }}
        {{Form::select("profesor_id", $profesores, null, ["class" => "form-control", "placeholder" => "Selecciona un profesor"]) }}
        @error('profesor_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group @if($errors->has('imagen')) has-error has-feedback @endif" style="text-align:center;">
        {{ Form::label("imagen", __('PROGRAMA'), ['class' => 'control-label']) }}
        <br>
        {{ Form::file("imagen") }}
        @error('imagen')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    </br>
    <div class="form-check">
        <input class="form-check-input" id="leido" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label text-dark" for="flexCheckDefault">
            He leído y declaro que el programa adjunto se realizó conforme a la: <a target="_blank" class="btn btn-danger" href="{{asset('./Disposicion.pdf')}}">Disposición 30/05</a>
        </label>
    </div>
    <br>
    <button type="submit" id="boton" disabled class="btn btn-success btn-block container-fluid p-3">{{__('Guardar')}}</button>
</div>
{!!Form::close()!!}





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Script Get Materias -->
<script type='text/javascript'>
    var checkbox = document.getElementById('leido');
    checkbox.addEventListener("change", validaCheckbox, false);

    function validaCheckbox() {
        var checked = checkbox.checked;
        if (checked) {
            $('#boton').prop('disabled', false);
        } else {
            $('#boton').prop('disabled', true);
        }
    }



    function search() {
        var anio_id = document.getElementById('anio_id').value;
        var carrera_id = document.getElementById('carrera_id').value;
        var sede_id = document.getElementById('sede_id').value;
        $('#materia_id').find('option').not(':first').remove();
        $('#materia_id').find('option').remove();
        $('#materia_id').append($('<option></option>').html('Cargando datos...'));
        $.ajax({
            url: '/getMaterias/' + carrera_id + '/' + anio_id + '/' + sede_id,
            type: 'get',
            dataType: 'json',
            success: function(response) {

                var len = 0;
                if (response['data'] != null) {
                    len = response['data'].length;
                }

                if (len > 0) {
                    $('#materia_id').find('option').remove();
                    $('#materia_id').append($('<option></option>').html('Seleccione una carrera...'));
                    for (var i = 0; i < len; i++) {

                        var id = response['data'][i].id;
                        var descripcion = response['data'][i].descripcion;

                        var option = "<option value='" + id + "'>" + descripcion + "</option>";

                        $("#materia_id").append(option);
                    }
                }

            }
        });
    }

    function searchCarreras() {
        var sede_id = document.getElementById('sede_id').value;
        //var sede_id = document.getElementById('sede_id').value;
        var carrera_id = document.getElementById('carrera_id').value;
        //$('#carrera_id').find('option').not(':first').remove();
        // $('#carrera_id').find('option').remove();
        $('#carrera_id').append($('<option></option>').html('Cargando datos...'));

        $.ajax({
            url: '/getCarreras/' + sede_id,
            type: 'get',
            dataType: 'json',
            success: function(response) {

                var len = 0;
                if (response['data'] != null) {
                    len = response['data'].length;
                }

                if (len > 0) {
                    $('#carrera_id').find('option').remove();
                    $('#carrera_id').append($('<option></option>').html('Seleccione una carrera...'));

                    for (var i = 0; i < len; i++) {

                        var id = response['data'][i].id;
                        var descripcion = response['data'][i].descripcion;

                        var option = "<option value='" + id + "'>" + descripcion + "</option>";

                        $("#carrera_id").append(option);
                    }
                }

            }
        });
    }



    $(document).ready(function() {
        //var miDato = localStorage.getItem("nombre").value;
        if (localStorage.getItem("nombre").value != "Cargando datos...") {
            $('#materia_id').find('option').remove();
            $('#materia_id').append($('<option></option>').html('Seleccione una carrera...'));

            $("#materia_id").append(localStorage.getItem("nombre").value);
        }
    });


    //$("#exampleModal").modal("show");
    $('#anio_id').change(function() {
        search();

    });
    $('#carrera_id').change(function() {
        search();
    });
    $('#sede_id').change(function() {
        searchCarreras();
        search();
    });
    $('#materia_id').change(function() {
        localStorage.clear();
        localStorage.setItem("nombre", document.getElementById('materia_id').value);
    });
</script>
@endsection
