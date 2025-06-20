@extends('backend.layouts.main')
@section('title', 'Turnos')
@section('content')

    <div class="container mt-3">

        @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('warning') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card mx-auto">
                    <div class="card-header text-center">
                        Turno del {{ date('d-m-Y H:i', strtotime($turno->dia_hora)) }}
                    </div>
                    <div class="card-body">
                        {{ Form::model($turno, ['method' => 'put', 'route' => ['turnos.update', $turno->id]]) }}
                        @csrf
                        <div class="row justify-content-center">
                            <div class="form-group col-md-6 ">
                                @php
                                    $dia = \Carbon\Carbon::create($turno->dia_hora)->toDateString();
                                    $hora = \Carbon\Carbon::create($turno->dia_hora)->toTimeString();
                                @endphp
                                {{ Form::label('nueva_fecha', 'Cambiar fecha', ['class' => 'control-label']) }}
                                {{ Form::date('nueva_fecha', $dia, ['class' => 'form-control']) }}
                                @error('nueva_fecha')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group  col-md-6 ">
                                {{ Form::label('nueva_hora', 'Cambiar hora', ['class' => 'control-label']) }}
                                {!! Form::time('nueva_hora', $hora, ['class' => 'form-control']) !!}
                                @error('nueva_hora')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group  col-md-6 mt-2">
                                {{ Form::label('dni', 'Cambiar DNI', ['class' => 'control-label']) }}
                                {!! Form::number('dni', old('dni'), [
                                    'step' => '1',
                                    'min' => '10000000',
                                    'max' => '100000000',
                                    'class' => 'form-control',
                                    'placeholder' => 'Ingrese el dni',
                                ]) !!}
                                @error('dni')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 mt-2">
                                {{ Form::label('carrera_id', 'Carreras', ['class' => 'control-label']) }}
                                {{-- Form::select('carreras', $carreras, old('carreras', $carreras) , ['class' => 'form-control', 'placeholder' => 'Seleccione una carrera']) --}}
                                {{ Form::select('carrera_id', $carreras, old('carrera_id'), ['class' => 'form-control', 'placeholder' => 'Seleccione una carrera']) }}
                                @error('carrera_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col text-center">
                            @if (Auth::user()->is_admin == 1)
                                {!! Form::submit('Guardar', ['class' => 'btn btn-primary center col-sm-4 mt-3']) !!}
                            @endif
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="col text-center mt-3">
                    <a class="btn btn-success center col-sm-4" href="{{ route('turnos.index') }}">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
