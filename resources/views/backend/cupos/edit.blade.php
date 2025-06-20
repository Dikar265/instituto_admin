@extends('backend.layouts.main')
@section('title', 'Cupos')
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
                        Cupos de {{ $cupo->carrera->descripcion }}
                    </div>
                    <div class="card-body">
                        {{ Form::model($cupo, ['method' => 'put', 'route' => ['cupos.update', $cupo->id]]) }}
                        @csrf
                        <div class="row justify-content-center">
                            <div class="form-group  col-md-4">
                                {{ Form::label('cupos', 'Cupos', ['class' => 'control-label']) }}
                                {{ Form::number('cupos', old('cupos'), ['step' => '1', 'min' => '1', 'max' => '300', 'class' => 'form-control', 'placeholder' => 'Ingrese cantidad de cupos']) }}
                                @error('cupos')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group  col-md-4">
                                {{ Form::label('reservados', 'Reservados', ['class' => 'control-label']) }}
                                {{ Form::number('reservados', old('reservados'), ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad de reservados']) }}
                                @error('cupos')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group  col-md-4">
                                {{ Form::label('inscriptos', 'Inscriptos', ['class' => 'control-label']) }}
                                {{ Form::number('inscriptos', old('inscriptos'), ['class' => 'form-control', 'placeholder' => 'Ingrese cantidad de inscriptos']) }}
                                @error('cupos')
                                    <div class="invalid-feedback">{{ $message }}</div>
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
                    <a class="btn btn-success center col-sm-4" href="{{ route('cupos.index') }}">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
