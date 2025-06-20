@extends('backend.layouts.main')
@section('title', 'Categoria de Residuos')
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
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mx-auto">
                    <div class="card-header text-center">
                        Nombre actual de la Categoria : <strong>{{ $categoriasResiduo->nombre}}</strong>
                    </div>
                    <div class="card-body">
                        {{ Form::model($categoriasResiduo, ['method' => 'put', 'route' => ['categoriaresiduos.update', $categoriasResiduo->id]]) }}
                        @csrf
                        <div class="row justify-content-center">
                            <div class="form-group col-md-4 text-center">
                                {{ Form::label('nombre', 'Cambiar nombre', ['class' => 'control-label']) }}
                                {{Form::text("nombre", old("nombre"), ["class" => "form-control", "placeholder" => "Nuevo nombre", ])}}
                                @error('nombre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>  
                            
                        </div>
                        <div class="col text-center">
                            {!! Form::submit("Guardar", ['class' => 'btn btn-primary center col-sm-4 mt-3']) !!}
                        </div>
                        {!!Form::close()!!}
                    </div>
                </div> 
                <div class="col text-center mt-3">
                    <a class="btn btn-success center col-sm-4" href="{{ route('categoriaresiduos.index') }}">Volver</a>  
                </div>
            </div>
        </div>
    </div>
@endsection