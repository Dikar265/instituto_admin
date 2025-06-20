@extends('backend.layouts.main')

@section('content')
    <div class="row my-4">
        <div class="col-6 mx-auto p-3 bg-white">
            {{ Form::model($espera, ['method' => 'put', 'route' => ['espera.turno', $espera->id]]) }}
            @csrf
            <div class="mb-3">
            {{ Form::label('fecha', 'Fecha Turno', ['class' => 'control-label']) }}    
             {{ Form::date('fecha', null, ['class' => 'form-control']) }}
                                @error('fecha')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
            </div>
            <div class="mb-3">
                     {{ Form::label('hora', 'Hora Turno', ['class' => 'control-label']) }}
                                {!! Form::time('hora', null, ['class' => 'form-control']) !!}
                                @error('hora')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
            </div>    
            <div class="mb-3">
                {{ Form::label('carrera_id', 'Carrera', ['class' => 'col-sm-2 col-form-label']) }}
                 {{ Form::select('carrera_id2', $carreras,  $espera->carrera->id , ['class' => 'form-control', 'placeholder' => old('carrera_id'), 'disabled' => 'disabled']) }}
                  
                {{ Form::text('carrera_id',  $espera->carrera->id , ['class' => 'form-control', 'placeholder' => '', 'hidden' => 'hidden']) }}
            </div>
            <div class="mb-3">
                {{ Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 col-form-label']) }}
                {{ Form::text('nombre', old('name'), ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre', 'readonly' => 'readonly']) }}
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                {{ Form::label('apellido', 'Apellido', ['class' => 'col-sm-2 col-form-label']) }}
                {{ Form::text('apellido', old('apellido'), ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido', 'readonly' => 'readonly']) }}
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                {{ Form::label('dni', 'DNI', ['class' => 'col-sm-2 col-form-label']) }}
                {{ Form::text('dni', old('dni'), ['class' => 'form-control', 'placeholder' => 'Ingrese el DNI', 'readonly' => 'readonly']) }}
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                {{ Form::label('telefono', 'Celular', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="row">
                    <div class="col">

                        {{ Form::text('telefono', old('telefono'), ['class' => 'form-control', 'placeholder' => 'Ingrese el celular', 'readonly' => 'readonly']) }}
                    </div>
                    @error('telefono')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col">

                        {{ Form::text('tel_alternativo', old('tel_alternativo'), ['class' => 'form-control', 'placeholder' => 'Ingrese el telefono alternativo', 'readonly' => 'readonly']) }}
                        @error('tel_alternativo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                {{ Form::label('email', 'Email', ['class' => 'col-sm-2 col-form-label']) }}
                {{ Form::email('email', old('name'), ['class' => 'form-control', 'placeholder' => 'Ingrese el email', 'readonly' => 'readonly']) }}
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Asignar Turno</button>
                {!! Form::close() !!}
                <a href="{{ route('espera.index') }}"><button type="button" class="btn btn-primary">Volver</button></a>
            </div>
        </div>
    </div>
@endsection
