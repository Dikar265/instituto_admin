@extends('backend.layouts.main')

@section('content')
<div class="row my-4">
    <a href="{{ route('espera.index') }}"><div class="d-flex justify-content-end"><button type="button" class="btn btn-primary me-5">Volver</button></div></a>
    <div class="col-9 mx-auto p-3 d-flex justify-content-center"><h3>Lista de Espera</h3></div>
    <div class="col-6 mx-auto p-3 bg-white">
        {{ Form::open(['route' => 'espera.store']) }}
        @csrf
        <div class="mb-3">
                {{ Form::label('descripcion', 'Carreras', ['class' => 'col-sm-2 col-form-label']) }}
                
                {{ Form::select('carrera_id', $cupos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione carrera...']) }}
                @error('carrera_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                {{ Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 col-form-label']) }}
                {{ Form::text('nombre', old('name'), ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre']) }}
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                {{ Form::label('apellido', 'Apellido', ['class' => 'col-sm-2 col-form-label']) }}
                {{ Form::text('apellido', old('apellido'), ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido']) }}
                @error('apellido')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                {{ Form::label('dni', 'DNI', ['class' => 'col-sm-2 col-form-label']) }}
                {{ Form::text('dni', old('dni'), ['class' => 'form-control', 'placeholder' => 'Ingrese el DNI']) }}
                @error('dni')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                {{ Form::label('telefono', 'Celular', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="row">
                    <div class="col">
                    {{ Form::text('caractel', old('caractel'), ['class' => 'form-control', 'placeholder' => 'Ingrese la caracteristica']) }}
                    @error('caractel')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    {{ Form::text('telefono', old('telefono'), ['class' => 'form-control', 'placeholder' => 'Ingrese el celular']) }}
                    </div>
                    @error('telefono')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col">
                    {{ Form::text('caractalt', old('caractalt'), ['class' => 'form-control', 'placeholder' => 'Ingrese caract. telefono alternativo']) }}
                    @error('caractalt')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        {!! Form::close() !!}
    </div>
</div>
@endsection