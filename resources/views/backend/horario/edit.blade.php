@extends('backend.layouts.main')
@section('title', 'Horarios')
@section('content')

<style>
  .Inicio {
    text-align: center;
    margin: 20px;
    font-family: 'Quicksand', sans-serif;
    font-weight: 800;
    position: relative;
  }
</style>

<div class="Inicio">
  <div style="position:absolute;top:0;left:30px;cursor:pointer;">
    <a href="{{ route('horario.search.carrera', ['sede' => $horarios->sede->id, 'carrera' => $horarios->carrera->id, 'anio' =>  $horarios->anio->id, 'comision' => $horarios->comision->id]); }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
      </svg>
    </a>
  </div>
  <h1 class="TextoInicio">Editar horarios</h1>
</div>

<div>
  @if(Session::has('status'))
  <div class="alert alert-success">{{ Session('status')}}</div>
  @endif
</div>


<div class="links">
  {{ Form::model($horarios, [ 'method' => 'put' , 'route' => ['horario.update', $horarios->id],  'files' => true]) }}

  @csrf
  <!-- {{ csrf_field() }} -->
  <div class="form-group">
    {{ Form::label("sede_id",'Sede', ['class' => 'control-label']) }}
    {{Form::text("sede_id", $horarios->sede->descripcion , ["class" => "form-control", "readonly"])}}

  </div>

  <div class="form-group">
    {{ Form::label("carrera_id",'Carrera', ['class' => 'control-label']) }}
    {{Form::text("carrera_id", $horarios->carrera->descripcion , ["class" => "form-control", "readonly" ])}}
  </div>

  <div class="form-group">
    {{ Form::label("anio_id",'Año', ['class' => 'control-label']) }}
    {{Form::text("anio_id", $horarios->anio->descripcion , ["class" => "form-control", "readonly" ])}}

  </div>
  <div class="form-group">
    {{ Form::label("comision_id",'Comisión', ['class' => 'control-label']) }}
    {{Form::text("comision_id", $horarios->comision->comision , ["class" => "form-control", "readonly" ])}}
  </div>

  <div class="form-group">
    {{ Form::label("dia",'Día', ['class' => 'control-label']) }}
    @if(empty($dia))
    {{Form::select("dia", $dias, null, ["class" => "form-control", "placeholder" => "Seleccione un día"]) }}
    @else

    {{Form::text("dia", $dia , ["class" => "form-control" ])}}
    @endif
    @error('dia')<div class="alert alert-danger">{{ $message }}</div>@enderror

  </div>

  <div class="form-group">
    {{ Form::label("modulohorario_id",'Módulo', ['class' => 'control-label']) }}
    @if(empty($modulo))
    {{Form::select("modulohorario_id", $modulosHorarios, null, ["class" => "form-control", "placeholder" => "Seleccione un   horario"]) }}
    @else
    {{Form::text("modulohorario_id", $horarios->moduloHorario->id , ["class" => "form-control" ])}}
    @endif
    @error('modulohorario_id')<div class="alert alert-danger">{{ $message }}</div>@enderror

  </div>

  <div class="form-group">
    {{ Form::label("materia_id",'Materia', ['class' => 'control-label']) }}
    {{Form::select("materia_id", $materias, null, ["class" => "form-control", "placeholder" => "Seleccione una materia"]) }}
    @error('materia_id')<div class="alert alert-danger">{{ $message }}</div>@enderror

  </div>

  <div class="form-group">
    {{ Form::label("profesor_id",'Profesor', ['class' => 'control-label']) }}
    {{Form::select("profesor_id", $profesores, null, ["class" => "form-control", "placeholder" => "Seleccione un  profesor"]) }}
    @error('profesor_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
  </div>

  <div class="form-group">
    {{ Form::label("comentario",'Comentario', ['class' => 'control-label']) }}
    {{Form::text("comentario", null , ["class" => "form-control" ])}}

  </div>
  </br><button type="submit" class="btn btn-success form-control">Guardar</button>
</div>
{!!Form::close()!!}
</div>

{!!Form::close()!!}
@endsection