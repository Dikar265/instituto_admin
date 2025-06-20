@extends('backend.layouts.main')
@section('title', 'Materias')
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

        .form-group label {
            outline: none;
            margin-bottom: 5px;
            font-family: 'Quicksand', sans-serif;
            font-weight: 800;
            font-size: 20px;
        }
    </style>
    <div class="Inicio">
        {{ Form::model($materias, ['method' => 'put', 'route' => ['materia.update', $materias->id], 'files' => true]) }}
        <div style="position:absolute;top:0;left:30px;cursor:pointer;">
            <a href="{{ route('carrera.materias', ['carrera_id' => $materias->carrera_id ]) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black"
                    class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
            </a>
        </div>
        <h1>Editar Materia</h1>
    </div>
    <div>
        @if (Session::has('status'))
            <div class="alert alert-success">{{ Session('status') }}</div>
        @endif
    </div>
    <div class="links">
        
        @csrf <!-- {{ csrf_field() }} -->
        <div class="form-group @if ($errors->has('titulo')) has-error has-feedback @endif">
            {{ Form::label('descripcion', __('Descripción'), ['class' => 'control-label']) }}
            {{ Form::text('descripcion', old('descripcion'), ['class' => 'form-control']) }}
            @error('descripcion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {{ Form::label('carrera', __('Carrera'), ['class' => 'control-label']) }}
                {{ Form::select('carrera_id', $carreras, null, ['class' => 'form-control']) }}
                @error('carrera')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {{ Form::label('anio', __('Año'), ['class' => 'control-label']) }}
                {{ Form::select('anio_id', $anios, null, ['class' => 'form-control']) }}
                @error('anio_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('orden', __('Orden'), ['class' => 'control-label']) }}
            {{ Form::number('orden', old('orden'), ['class' => 'form-control']) }}
            @error('orden')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </br> <button type="submit" class="btn btn-success btn-block container-fluid p-3">{{ __('Guardar') }}</button>
    </div>
    {!! Form::close() !!}
@endsection
