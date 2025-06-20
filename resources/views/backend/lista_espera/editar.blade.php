@extends('backend.layouts.main')

@section('content')
    <div class="row my-4">
        <div class="col-6 mx-auto p-3 bg-white">
            {{ Form::model($espera, ['method' => 'put', 'route' => ['espera.update', $espera->id]]) }}
            @csrf
            <div class="mb-3">
                {{ Form::label('carrera_id', 'Carrera', ['class' => 'col-sm-2 col-form-label']) }}
                {{ Form::select('carrera_id', $carreras, null, ['class' => 'form-control', 'placeholder' => old('carrera_id')]) }}
            </div>
            <div class="mb-3">
                {{ Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 col-form-label']) }}
                {{ Form::text('nombre', old('name'), ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre']) }}
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                {{ Form::label('apellido', 'Apellido', ['class' => 'col-sm-2 col-form-label']) }}
                {{ Form::text('apellido', old('apellido'), ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido']) }}
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                {{ Form::label('dni', 'DNI', ['class' => 'col-sm-2 col-form-label']) }}
                {{ Form::text('dni', old('dni'), ['class' => 'form-control', 'placeholder' => 'Ingrese el DNI']) }}
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                {{ Form::label('telefono', 'Celular', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="row">
                    <div class="col">

                        {{ Form::text('telefono', old('telefono'), ['class' => 'form-control', 'placeholder' => 'Ingrese el celular']) }}
                    </div>
                    @error('telefono')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col">

                        {{ Form::text('tel_alternativo', old('tel_alternativo'), ['class' => 'form-control', 'placeholder' => 'Ingrese el telefono alternativo']) }}
                        @error('tel_alternativo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                {{ Form::label('email', 'Email', ['class' => 'col-sm-2 col-form-label']) }}
                {{ Form::email('email', old('name'), ['class' => 'form-control', 'placeholder' => 'Ingrese el email']) }}
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Enviar</button>
                {!! Form::close() !!}
                <a href="{{ route('espera.index') }}"><button type="button" class="btn btn-primary">Volver</button></a>
            </div>
        </div>
    </div>
@endsection
