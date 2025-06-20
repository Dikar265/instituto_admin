@extends('backend.layouts.main')
@section('title', 'Cupos')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card mx-auto">
                <div class="card-header text-center">
                    Cupos de {{ $cupo->carrera->descripcion }}
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title"><b>Cantidad: {{ $cupo->cupos }}</b></h5>
                    <h5 class="card-title"><b>Inscriptos: {{ $cupo->inscriptos }}</b></h5>
                    <h5 class="card-title"><b>Reservados: {{ $cupo->inscriptos }}</b></h5>
                    <a class="btn btn-success" href="{{ route('cupos.index') }}">Volver</a>
                </div>
                </div>   
            </div>
        </div>
    </div>
@endsection