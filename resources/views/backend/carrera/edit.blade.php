@extends('backend.layouts.main')
@section('title', 'Carreras')
@section('content')

<style>
    .Inicio {
        text-align: center;
        margin: 20px;
        font-family: 'Quicksand', sans-serif;
        font-weight: 800;
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
</style>


<div class="Inicio">
    <h1 class="TextoInicio">Editar Carrera</h1>
</div>
<div>
    @if(Session::has('status'))
    <div class="alert alert-success">{{ Session('status')}}</div>
    @endif
</div>
<div class="links">
    {{ Form::model($carreras, [ 'method' => 'put' , 'route' => ['carrera.update', $carreras->id],  'files' => true]) }}
    @csrf
    <!-- {{ csrf_field() }} -->
    <div class="form-group @if($errors->has('titulo')) has-error has-feedback @endif">
        {{ Form::label("descripcion", 'descripcion', ['class' => 'control-label']) }}
        {{Form::text("descripcion", old("descripcion"), ["class" => "form-control" ])}}
        @error('descripcion') <div class="alert alert-danger">{{ $message }}</div>@enderror
    </div>
    <div class="form-group">
        {{ Form::label("anios", __('AÑOS'), ['class' => 'control-label']) }}
        {{Form::text("anios", old("anios"), ["class" => "form-control" ])}}
        @error('anios')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label("resolucion", __('RESOLUCIÓN'), ['class' => 'control-label']) }}
        {{Form::text("resolucion", old("resolucion"), ["class" => "form-control" ])}}
        @error('resolucion')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label("texto", __('TEXTO'), ['class' => 'control-label']) }}
        {{Form::textarea("texto", old("texto"), ["class" => "form-control" ])}}
        @error('texto')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label("nombre_carpeta", __('CARPETA'), ['class' => 'control-label']) }}
        {{Form::text("nombre_carpeta", old("nombre_carpeta"), ["class" => "form-control" ])}}
        @error('nombre_carpeta')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group" style="text-align:center;">
        {{ Form::label("imagen", 'IMAGEN', ['class' => 'control-label']) }}
        <br>
        {{ Form::file("imagen") }}
        @error('imagen')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        {{ Form::label("sedes_id", __('SEDES'), ['class' => 'control-label']) }}
        @foreach($sedes as $id => $nombre)
            @if( $carreras->sedes()->find($id))
            {{ Form::checkbox('sede'.$id, $id, 'X', ['class' => 'check-input']) }}{{ Form::label($id, $nombre, ['class' => 'check-label']) }}
            @else
            {{ Form::checkbox('sede'.$id, $id, null, ['class' => 'check-input']) }}{{ Form::label($id, $nombre, ['class' => 'check-label']) }}
            @endif
        @endforeach
    </div>
    </br>
    <button type="submit" class="btn btn-success btn-block container-fluid p-3">{{__('Guardar')}}</button>
</div>
{!!Form::close()!!}
@endsection