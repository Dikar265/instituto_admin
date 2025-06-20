@extends('backend.layouts.main')
@section('title', 'Residuos')
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

    {{ Form::open(['route' => 'residuos.store' , 'class' => 'p-3 border border-dark rounded']) }}
    @csrf
        <div class="form-group">
            {{ Form::label('categoria', 'Categoria', ['class' => 'control-label']) }}
            {{ Form::select('categoria', $categoriasResiduo, null, ['class' => 'form-control', 'placeholder' => 'Seleccione clase de residuo']) }}
            @error('categoria')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            
            {{ Form::label('peso', 'Peso', ['class' => 'control-label']) }}
            {{Form::text("peso", old("peso"), ["class" => "form-control", "placeholder" => "Ingrese peso", ])}}
            @error('peso')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group ">
            
            {{ Form::label('fecha', 'Fecha', ['class' => 'control-label']) }}
            {{Form::date("fecha", old("fecha"), ["class" => "form-control", "placeholder" => "Ingrese fecha", ])}}
            @error('fecha')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </br><button type="submit" style="width: 100%;" class="btn btn-primary">Guardar</button></div>

    {!! Form::close() !!}
    <div class="col text-center mb-3">
        <a class="btn btn-success center col-sm-8" href="{{ route('residuos.index') }}">Volver</a>  
    </div>
</div>

@endsection