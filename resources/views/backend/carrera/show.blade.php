@extends('backend.layouts.main')
@section('title', 'Carreras')
@section('content')
<style>
      img {
            width: 100%;
      }
      .links{
            position: relative;
      }
</style>
<div>
      @if(Session::has('status'))
      <div class="alert alert-success">{{ Session('status')}}</div>
      @endif
</div>

<div class="Inicio">

<div style="position:absolute;top:0;left:30px;cursor:pointer;">
<a href="/carrera">
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
    </svg>
</a>
</div>
  <h1 class="TextoInicio">Carrera</h1>
</div>
<div class="links">
      {{ Form::model($carrera, [ 'method' => 'get' , 'route' => ['carrera.show', $carrera->id]]) }}
      <div class="form-group @if($errors->has('descripcion')) has-error has-feedback @endif">
            {{ Form::label("Carrera", 'Carrera', ['class' => 'control-label']) }}
            {{Form::text("descripcion", null , ["class" => "form-control", "readonly" ])}}
      </div>
      <div class="form-group @if($errors->has('anios')) has-error has-feedback @endif">
            {{ Form::label("Años", 'Años', ['class' => 'control-label']) }}
            {{Form::text("anios", null , ["class" => "form-control", "readonly" ])}}
      </div>
      <div class="form-group @if($errors->has('texto')) has-error has-feedback @endif">
        {{ Form::label("texto", __('TEXTO'), ['class' => 'control-label']) }}
        {{Form::textarea("texto", old("texto"), ["class" => "form-control", "readonly" ])}}
    </div>
      <div class="form-group @if($errors->has('resolucion')) has-error has-feedback @endif">
            {{ Form::label("resolucion", 'Resolución', ['class' => 'control-label']) }}
            {{Form::text("resolucion", old("cresolucion"), ["class" => "form-control", "readonly" ])}}
            @error('resolucion')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
      </div>
      <div class="form-group @if($errors->has('imagen')) has-error has-feedback @endif">
            {{ Form::label(__('Imagen de la carrera'), null, ['class' => 'control-label', 'for' => 'imagen']) }}
            @if($carrera->imagen)
            @if(Str::startsWith($carrera->imagen, 'http'))
            <img src="{{ $carrera->imagen }}" class="img-responsive " alt="...">
            @else
            <img src="{{ asset('./storage/'. $carrera->imagen) }}" class="img-responsive" alt="...">
            @endif
            @else
            <h5 class="text-center text-muted"> No hay imagen disponible </h5>
            <hr>
            @endif
      </div>
      {!!Form::close()!!}
</div>
@endsection