@extends('backend.layouts.main')
@section('title', 'Cupos')
@section('content')

    <div class="links">
        @if (sizeof($carreras) > 0)
            <div>
                @if (Session::has('status'))
                    <div class="alert alert-success">{{ Session('status') }}</div>
                @endif
            </div>

            {{ Form::open(['route' => 'cupos.store', 'class' => 'p-3 border border-dark rounded']) }}
            @csrf
            <div class="form-group">
                {{ Form::label('carreras', 'Carreras', ['class' => 'control-label']) }}
                {{ Form::select('carreras', $carreras, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una carrera']) }}
                @error('carreras')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group ">
                {{ Form::label('cupos', 'Cupos', ['class' => 'control-label']) }}
                {{ Form::number('cupos', 'value', ['step' => '1', 'min' => '1', 'max' => '300', 'class' => 'form-control', 'placeholder' => 'Ingrese cantidad de cupos']) }}
                @error('cupos')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col text-center mt-3">
                @if (Auth::user()->is_admin == 1)
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary', 'style' => 'width: 100%']) !!}
                @endif
            </div>
            {!! Form::close() !!}
        @else
            <div class="alert alert-secondary">Ya se asignaron todos los cupos a las carreras.</div>
        @endif

        <div class="col text-center mt-3">
            <a class="btn btn-success center col-sm-12" href="{{ route('cupos.index') }}">Volver</a>
        </div>

    </div>

@endsection
