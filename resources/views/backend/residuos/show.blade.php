@extends('backend.layouts.main')
@section('title', 'Residuos')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card mx-auto">
                <div class="card-header text-center">
                    Nombre de la Categoria
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">
                        <b>
                           
                            {{ $pesosResiduo->peso }}
                            
                        </b>
                    </h5>
                    <a class="btn btn-success" href="{{ route('residuos.index') }}">Volver</a>
                </div>
                </div>   
            </div>
        </div>
    </div>
@endsection