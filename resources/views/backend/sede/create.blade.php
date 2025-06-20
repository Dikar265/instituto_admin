@extends('backend.layouts.main')
@section('title', 'Sedes')

@section('content')
<div class="Inicio">
    <div style="position:absolute;top:0;left:30px;cursor:pointer;">
        <a href="{{ route('sede.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg>
        </a>
    </div>
    <h1 class="TextoInicio">Nueva Sede</h1>
</div>
<div>
    @if(Session::has('status'))
    <div class="alert alert-success">{{ Session('status')}}</div>
    @endif
</div>
<div class="links">
    {{ Form::open(['route' => 'sede.store', 'files' => true]) }}
    @csrf
    <!-- {{ csrf_field() }} -->
    <div class="form-group">
        {{ Form::label("descripcion", 'Descripción', ['class' => 'control-label']) }}
        {{Form::text("descripcion", old("descripcion"), ["class" => "form-control", "placeholder" => "", ])}}
        @error('descripcion')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label("calle", 'Calle', ['class' => 'control-label']) }}
        {{Form::text("calle", old("calle"), ["class" => "form-control", "placeholder" => "", ])}}
        @error('calle')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label("numero", "Número", ['class' => 'control-label']) }}
        {{Form::number("numero", old("numero"), ["class" => "form-control", "placeholder" => "", ])}}
        @error('numero')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label("ciudad", "Ciudad", ['class' => 'control-label']) }}
        {{Form::text("ciudad", old("ciudad"), ["class" => "form-control", "placeholder" => "", ])}}
        @error('ciudad')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group @if($errors->has('imagen')) has-error has-feedback @endif">
        {{ Form::label("sedeimagen", "Imagen", ['class' => 'control-label']) }}
        {{ Form::file("sedeimagen" , ["class" => "form-control" ])}}
        @error('sedeimagen')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    </br>
    <button type="submit" class="btn btn-success form-control">Guardar</button>
</div>
</div>
{!!Form::close()!!}
@endsection