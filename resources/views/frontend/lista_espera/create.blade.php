@extends('frontend.layout.main')
@section('title', 'Inscripciones')
@section('content')

    <div class="links">

        {{--  <a href="{{ route('espera.index') }}">
            <div class="d-flex justify-content-end"><button type="button" class="btn btn-primary me-5">Volver</button></div>
        </a>  --}}

        <div>
            {{ Form::open(['route' => 'lista.espera.store', 'class' => 'p-3 border border-dark rounded']) }}
            @csrf
<!--             <div class="col-9 mx-auto d-flex justify-content-center text-dark">
                <h2 class="text-danger"><b>LISTA DE ESPERA</b></h2>
            </div> -->
              <div class=" alert alert-light text-center text-danger"><h2>LISTA DE ESPERA</h2></div>
            <div class="form-group ">
                {{ Form::label('descripcion', 'Carrera', ['class' => 'control-label']) }}

               <!--  {{ Form::select('carrera_id', $cupos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione carrera...']) }} -->
               {{ Form::select('carrera_id', $cupo, null, ['class' => 'form-control', 'placeholder' => 'Seleccione carrera...']) }}
                @error('carrera_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group ">
                {{ Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 col-form-label']) }}
                {{ Form::text('nombre', old('name'), ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre']) }}
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group ">
                {{ Form::label('apellido', 'Apellido', ['class' => 'col-sm-2 col-form-label']) }}
                {{ Form::text('apellido', old('apellido'), ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido']) }}
                @error('apellido')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group ">
                {{ Form::label('dni', 'DNI', ['class' => 'col-sm-2 col-form-label']) }}
                {{ Form::text('dni', old('dni'), ['class' => 'form-control', 'placeholder' => 'Ingrese el DNI']) }}
                @error('dni')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group ">
                {{ Form::label('telefono', 'Celular', ['class' => 'col-sm-2 col-form-label']) }}
                <div class="row">
                    <div class="col">
                        {{ Form::text('caractel', old('caractel'), ['class' => 'form-control', 'placeholder' => 'Ingrese la caracteristica']) }}
                        @error('caractel')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        {{ Form::text('telefono', old('telefono'), ['class' => 'form-control', 'placeholder' => 'Ingrese el celular']) }}
                        @error('telefono')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

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
            <div class="form-group ">
                {{ Form::label('email', 'Email', ['class' => 'col-sm-2 col-form-label']) }}
                {{ Form::email('email', old('name'), ['class' => 'form-control', 'placeholder' => 'Ingrese el email']) }}
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col text-center mt-3">
                <button type="submit" class="btn btn btn-outline-success center col-sm-12"><b>ENVIAR</b></button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
