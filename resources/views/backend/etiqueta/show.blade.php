@extends('backend.layouts.main')
@section('title', 'Etiquetas')
@section('content')

<style>
    .Inicio{
        text-align: center;
        margin:20px;
        font-family: 'Quicksand', sans-serif;
        font-weight: 800;
        position:relative;
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
<div style="position:absolute;top:0;left:30px;cursor:pointer;">
<a href="/etiquetas">
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
    </svg>
</a>
</div>
      <h1 class="TextoInicio">Etiqueta</h1>
</div>
<div>
      @if(Session::has('status'))
      <div class="alert alert-success">{{ Session('status')}}</div>
      @endif
</div>
<div class="links">
      {{ Form::model($etiqueta, [ 'method' => 'get' , 'route' => ['etiquetas.show', $etiqueta->id]]) }}
      <div class="form-group @if($errors->has('nombre')) has-error has-feedback @endif">
            {{ Form::label("nombre", 'Nombre', ['class' => 'control-label']) }}
            {{Form::text("nombre", null , ["class" => "form-control", "readonly" ])}}
      </div>
      <div class="form-group @if($errors->has('descripcion')) has-error has-feedback @endif">
            {{ Form::label("descripcion", "Descripción", ['class' => 'control-label']) }}
            {{Form::text("descripcion", null , ["class" => "form-control", "readonly" ])}}
      </div>
      {!!Form::close()!!}
      @endsection