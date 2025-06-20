@extends('backend.layouts.main')
@section('title', 'Carreras')
@section('content')
  <h1>Carrera</h1>
  <div>
    @if(Session::has('status'))
    <div class="alert alert-success">{{ Session('status')}}</div>
    @endif
  </div>
  <div class="links">
   {{ Form::model($carrera, [ 'method' => 'get' , 'route' => ['carreras.show', $carrera->id]]) }}
    <div class="form-group @if($errors->has('carrera')) has-error has-feedback @endif">
          {{ Form::label("carrera", 'Carrera', ['class' => 'control-label']) }}
          {{Form::text("carrera", null , ["class" => "form-control", "readonly" ])}}                        
    </div>
    <div class="form-group">
          {{ Form::label("resolucion", 'Resolución', ['class' => 'control-label']) }}
          {{Form::text("resolucion", old("cresolucion"), ["class" => "form-control", "readonly" ])}}                        
          @error('resolucion')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
    </div>    
    <div class="form-group">
          {{ Form::label("res_archivo", 'Resolución PDF', ['class' => 'control-label']) }}
          @if($carrera->res_archivo)<span class="badge badge-light"><a href="{{ asset('./storage/'. $carrera->res_archivo) }}">{{ basename($carrera->res_archivo) }}</a> </span> @endif
    </div>   
{!!Form::close()!!}
@endsection