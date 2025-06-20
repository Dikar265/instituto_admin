@extends('backend.layouts.main')
@section('title', 'Residuos')
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
                         <strong>Modificar</strong>
                    </div>
                    <div class="card-body">
                        {{ Form::model($pesosResiduo, ['method' => 'put', 'route' => ['residuos.update', $pesosResiduo->id]]) }}
                        @csrf
                        <div class="row justify-content-center">

                            <div class="mb-3">
                                {{ Form::label('categoria_id', 'Categoria', ['class' => 'col-sm-2 col-form-label']) }}
                                {{ Form::select('categoria_id', $categoriasResiduo, null, ['class' => 'form-control', 'placeholder' => old('$categoriasResiduo')]) }}
                            </div>

                            <div class="form-group col-md-4 text-center">
                                {{ Form::label('peso', 'Cambiar peso', ['class' => 'control-label']) }}
                                {{Form::text("peso", old("peso"), ["class" => "form-control", "placeholder" => "Nueva categoria", ])}}
                                @error('peso')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>  
                            <div class="form-group col-md-4 text-center">
                                {{ Form::label('created_at', 'Fecha', ['class' => 'control-label']) }}
                                {{Form::date("created_at", $fecha, ["class" => "form-control", "placeholder" => "Nuevo fecha", ])}}
                                @error('peso')
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
                    <a class="btn btn-success center col-sm-4" href="{{ route('residuos.index') }}">Volver</a>  
                </div>
            </div>
        </div>
    </div>
@endsection