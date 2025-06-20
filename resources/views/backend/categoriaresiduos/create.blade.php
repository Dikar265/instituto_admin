@extends('backend.layouts.main')
@section('title', 'Categoria de Residuos')
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

    {{ Form::open(['route' => 'categoriaresiduos.store' , 'class' => 'p-3 border border-dark rounded']) }}
    @csrf
        <div class="form-group ">
            {{ Form::label('nombre', 'Nombre de la nueva Categoria', ['class' => 'control-label']) }}
            {{Form::text("nombre", old("nombre"), ["class" => "form-control", "placeholder" => "Nombre de la nueva Categoria", ])}}
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </br><button   type="submit" style="width: 100%;" class="btn btn-primary">Guardar</button></div>

    {!! Form::close() !!}
    <div class="col text-center mb-3">
        <a class="btn btn-success center col-sm-8" href="{{ route('categoriaresiduos.index') }}">Volver</a>  
    </div>
</div>

@endsection