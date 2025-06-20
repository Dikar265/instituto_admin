@extends('backend.layouts.main')
@section('title', 'Turnos')
@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card mx-auto">
                <div class="card-header text-center">
                    Turno del {{ date('d-m-Y H:i',strtotime($turno->dia_hora))}}
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">
                        <b>
                            DNI: 
                            @if($turno->dni == null)
                            No asignado aun
                            @else
                            {{ $turno->dni }}
                            @endif
                        </b>
                    </h5>
                    <h5 class="card-title">
                        <b>
                            Carrera: 
                            @if($turno->carrera_id == null)
                            No asignado aun
                            @else
                            {{ $turno->carrera->descripcion }}
                            @endif
                        </b>
                    </h5>
                    <a class="btn btn-success" href="{{ route('turnos.index') }}">Volver</a>
                </div>
                </div>   
            </div>
        </div>
    </div>
@endsection