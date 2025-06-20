@extends('backend.layouts.main')
@section('title', 'Horarios')
@section('content')

<style>
    .horarios:hover {
        background-color: #3A70FF;
        transition: background-color .5s;
        color: white;
    }

    .texto-tabla {
        font-size: .8em;
    }
    .Inicio {
    text-align: center;
    margin: 20px;
    font-family: 'Quicksand', sans-serif;
    font-weight: 800;
    position: relative;
  }
</style>
<div class="Inicio">
  <div style="position:absolute;top:0;left:30px;cursor:pointer;">
    <a href="{{ route('horario.index'); }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
      </svg>
    </a>
  </div>
  <h1 class="TextoInicio">Crear horarios</h1>
</div>
<div class="container-fluid">
    @if(Session::has('status'))
    <div class="alert alert-success alert-dismissible fade show">{{ Session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    {{ Form::open(['route' => 'horario.createHorario']) }}
    <div class="row mt-3 mb-2">

        <div class="input-group col">
            <label class="input-group-text bg-dark text-light" for="#">Sede</label>
            {{Form::text("sede", $sede->descripcion , ["class" => "form-control", "readonly" ])}}
            {{Form::text("sede_id", $sede->id , ["class" => "form-control", "hidden" ])}}

        </div>

        <div class="input-group col">
            <label class="input-group-text bg-dark text-light" for="#">Carrera</label>
            {{Form::text("carrera", $carrera->descripcion , ["class" => "form-control", "readonly" ])}}
            {{Form::text("carrera_id", $carrera->id , ["class" => "form-control", "hidden" ])}}
        </div>
    </div>

    <div class="row mb-2">
        <div class="input-group col">
            <label class="input-group-text bg-dark text-light" for="#">Año</label>
            {{Form::text("anio_id", $anio->descripcion , ["class" => "form-control", "readonly" ])}}
            {{Form::text("anio_id", $anio->id , ["class" => "form-control", "hidden" ])}}

        </div>
        <div class="input-group col">
            <label class="input-group-text bg-dark text-light" for="#">Comisión</label>
            {{Form::text("comision_id", $comision->comision , ["class" => "form-control", "readonly" ])}}
            {{Form::text("comision_id", $comision->id , ["class" => "form-control", "hidden" ])}}

        </div>
    </div>
</div>
{!!Form::close()!!}

<table class="table texto-tabla mb-0">
    <tr class="text-light text-center mb-0" style="background-color: #3A70FF;">
        <th class="text-left" scope="col">HORARIO</th>
        @foreach($dias as $dia)
        <th class="text-left" scope="col">{{$dia}}</th>
        @endforeach
    </tr>

    @foreach($modulosHorarios as $modulosHorario)
    <tr>
        <td class="bg-dark text-light text-center align-middle" style="">{{$modulosHorario->horainicio}} a {{$modulosHorario->horafin}}
            @foreach($dias as $index=>$dia)
        <td style="background: #F5F5F5;" class="text-center align-middle">
            @php ($a = 0)
            @foreach($horarios as $horario)

            @if($horario->dia == $index && $horario->moduloHorario->id == $modulosHorario->id )
            @php ($a++)
            <div class="text-center align-middle p-1">
                <div class="align-middle">
                    <strong class="h6 mb-1">{{$horario->materia->descripcion}}</strong>
                    <p class="mb-3">{{$horario->profesor->apellido}}, {{$horario->profesor->nombre}} </p>
                    <p class="mb-3">{{$horario->comentario}}</p>

                    {{ Form::model($horario, [ 'method' => 'delete', 'route' => ['horario.destroy', $horario -> id] ]) }}
                    @csrf
                    <a href="{{ route('horario.edit', ['horario' =>  $horario->id] ) }}" class="btn bg-primary">
                        <img src="{{ asset('svg/edit.svg') }}" width="20" height="20" alt="Editar" title="Editar">
                    </a>
                    <button type="submit" class="btn btn-danger" onclick="if (!confirm('¿Esta seguro de borrar el horario?')) return false;">
                        <img src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar" title="Borrar">
                    </button>
                    {!!Form::close()!!}
                </div>
            </div>
            @endif
            @endforeach
            @if($a == 0)
            @php ($a++)
            <div class="text-center px-5 py-4 m-auto">
                <p class="align-middle px-auto">{{ Form::open(['route' => 'horario.createHorario']) }}</p>

                {{Form::text("sede_id", $sede->id , ["class" => "form-control", "hidden" ])}}
                {{Form::text("carrera_id", $carrera->id , ["class" => "form-control", "hidden" ])}}
                {{Form::text("anio_id", $anio->id , ["class" => "form-control", "hidden" ])}}
                {{Form::text("comision_id", $comision->id , ["class" => "form-control", "hidden" ])}}
                {{Form::text("modulohorario_id", $modulosHorario->id , ["class" => "form-control", "hidden" ])}}
                {{Form::text("dia", $index , ["class" => "form-control", "hidden" ])}}
                <button type="submit" class="btn btn-success"><img src="{{ asset('svg/new.svg') }}" height="20" width="20" alt="Crear" title="Crear"></button>
            </div>
            </div>
            {!!Form::close()!!}

            @endif
        </td>
        @endforeach
    </tr>
    @endforeach

    <tr>


</table>
<p class="container-fluid my-0 text-center p-1" style="background-color: #E7E7E7;">Estos horarios podrían no ser los oficiales actuales del Instituto. En caso de duda pregunte al preceptor correspondiente a la carrera.</p>
@endsection