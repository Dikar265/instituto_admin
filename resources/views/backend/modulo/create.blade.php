@extends('backend.layouts.main')

@section('title', 'Módulo horario')

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
        <a href="{{ route('modulo.index'); }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg>
        </a>
    </div>
    <h1 class="TextoInicio">Crear módulo</h1>
</div>

<div>
    @if(Session::has('status'))
    <div class="alert alert-success">{{ Session('status')}}</div>
    @endif
</div>

<div class="links">
    {{ Form::open(['route' => 'modulo.store']) }}

    <div class="form-group">
        {{ Form::label("horainicio",'Hora de inicio', ['class' => 'control-label']) }}
        {{Form::time("horainicio", null , ["class" => "form-control"])}}
    </div>
    @error('horainicio')<div class="alert alert-danger">{{ $message }}</div>@enderror

    <div class="form-group">
        {{ Form::label("horafin",'Hora de finalización', ['class' => 'control-label']) }}
        {{Form::time("horafin", null , ["class" => "form-control" ])}}
    </div>
    @error('horafin')<div class="alert alert-danger">{{ $message }}</div>@enderror

    <div class="form-group">
        {{ Form::label("duracion",'Duración en minutos', ['class' => 'control-label']) }}
        {{Form::number("duracion", null , ["class" => "form-control", 'maxlength' => 60 ])}}
    </div>
    @error('duracion')<div class="alert alert-danger">{{ $message }}</div>@enderror

    </br><button type="submit" class="btn btn-success form-control">Guardar</button>
</div>
{!!Form::close()!!}
</div>
@endsection