@extends('backend.layouts.main')
@section('title', 'Programas')

@section('content')
<style>
    .Inicio {
        text-align: center;
        margin: 20px;
        font-family: 'Quicksand', sans-serif;
        font-weight: 800;
        position:relative;
    }

    .links {
        padding: 25px;
        width: 70%;
        margin: 0 auto;
    }

    .form-group {
        margin-top: 10px;
    }

    .form-group label {
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
</style>
<div class="Inicio">
<div style="position:absolute;top:0;left:30px;cursor:pointer;">
<a href="/programa">
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
    </svg>
</a>
</div>
    <h1 class="TextoInicio">Nuevo Programa</h1>
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
    {{ Form::open(['route' => 'programa.store', 'files' => true]) }}
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
        {{ Form::label("profesor_id", __('Profesores'), ['class' => 'control-label']) }}
        {{Form::select("profesor_id", $profesores, null, ["class" => "form-control", "placeholder" => "Selecciona un profesor"]) }}
        @error('profesor_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label("fechaentrega", __('FECHA DE ENTREGA'), ['class' => 'control-label']) }}
        {{Form::date("fechaentrega", null, ["class" => "form-control"]) }}
        @error('fechaentrega')
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
    <button type="submit" class="btn btn-success btn-block container-fluid p-3">{{__('Guardar')}}</button>
</div>
{!!Form::close()!!}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Script Get Materias -->
<script type='text/javascript'>

    function search(){
        var anio_id = document.getElementById('anio_id').value;
        var carrera_id = document.getElementById('carrera_id').value;
        var sede_id = document.getElementById('sede_id').value;
        //$('#materia_id').find('option').not(':first').remove();
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

    function searchCarreras(){
    var sede_id = document.getElementById('sede_id').value;
            //var sede_id = document.getElementById('sede_id').value;
            var carrera_id = document.getElementById('carrera_id').value;
            //$('#carrera_id').find('option').not(':first').remove();
            $('#carrera_id').find('option').remove();
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
    });
</script>
@endsection