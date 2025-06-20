@extends('backend.layouts.main')
@section('title', 'Programas')

@section('content')
  <style>
    .Inicio{
        text-align: center;
        margin:20px;
        font-family: 'Quicksand', sans-serif;
        font-weight: 800;
    }
    .links{
        padding:25px;
        width: 70%;
        margin: 0 auto;
    }
    .form-group{
        margin-top:10px;
    }
    .form-group label{
        outline: none;
        margin-bottom: 5px;
        font-family: 'Quicksand', sans-serif;
        font-weight: 800;
        font-size: 20px;
    }
    .form-control{
        border: 1px solid gray;
        padding:10px;
        outline: none;
    }
  </style>
  <div class="Inicio">
    <h1 class="TextoInicio">Nuevo Programa</h1>
  </div>
  <div>
    @if(Session::has('status'))
    <div class="alert alert-success">{{ Session('status')}}</div>
    @endif
  </div>
  <div class="links" >
  {{ Form::model($programa, [ 'method' => 'put' , 'route' => ['programa.update', $programa->id],  'files' => true]) }}
  @csrf <!-- {{ csrf_field() }} -->
  <div class="form-group">
          {{ Form::label("sede_id", __('SEDE'), ['class' => 'control-label']) }}
          {{Form::select("sede_id", $sede, null, ["class" => "form-control", "placeholder" => "Seleccione una sede"]) }}   
          @error('descripcion')
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
          @error('image')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
    </div>
    </br>
    <button type="submit"  class="btn btn-success btn-block container-fluid p-3">{{__('Guardar')}}</button>
</div>
{!!Form::close()!!}
@endsection