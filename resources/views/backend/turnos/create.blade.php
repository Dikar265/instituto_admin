@extends('backend.layouts.main')
@section('title', 'Turnos')
@section('content')

    <div class="links">

        <div>
            @if (Session::has('status'))
                <div class="alert alert-success">{{ Session('status') }}</div>
            @endif
        </div>

        <div>
            @if (Session::has('warning'))
                <div class="alert alert-warning">{{ Session('warning') }}</div>
            @endif
        </div>

        {{ Form::open(['route' => 'turnos.store', 'class' => 'p-3 border border-dark rounded']) }}
        @csrf
        <div class="form-group ">
            {{ Form::label('fechainicio', 'Fecha de Inicio', ['class' => 'control-label']) }}
            {{ Form::date('fechainicio', \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control']) }}
            @error('fechainicio')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('fechafin', 'Fecha de Fin', ['class' => 'control-label']) }}
            {{ Form::date('fechafin', \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control']) }}
            @error('fechafin')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            {{ Form::label('horainicio', 'Seleccionar hora de inicio', ['class' => 'control-label']) }}
            {!! Form::time('horainicio', \Carbon\Carbon::now()->format('H:i'), ['class' => 'form-control']) !!}
            @error('horainicio')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            {{ Form::label('horafin', 'Seleccionar hora de fin', ['class' => 'control-label']) }}
            {!! Form::time('horafin', \Carbon\Carbon::now()->format('H:i'), ['class' => 'form-control']) !!}
            @error('horafin')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            {{ Form::label('espacioanotados', 'Tiempo entre anotados (en minutos)', ['class' => 'control-label']) }}
            {{ Form::number('espacioanotados', 'value', ['step' => '1', 'min' => '1', 'max' => '300', 'class' => 'form-control', 'placeholder' => 'Ingrese la cantidad de tiempo ']) }}
            @error('espacioanotados')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        @if (Auth::user()->is_admin == 1)
            </br><button type="submit" style="width: 100%;" class="btn btn-primary">Guardar</button>
    </div>
    @endif
    {!! Form::close() !!}
    <div class="col text-center mb-3">
        <a class="btn btn-success center col-sm-8" href="{{ route('turnos.index') }}">Volver</a>
    </div>
    </div>

@endsection
