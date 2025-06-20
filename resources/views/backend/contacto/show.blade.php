@extends('backend.layouts.main')
@section('title', 'Contacto')
@section('content')

    <div class="container-fluid">
        {{ Form::open(['route' => 'contacto.createContacto']) }}

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
    <tr><td class="bg-dark text-light text-center align-middle" style="">{{$modulosHorario->horainicio}} a {{$modulosHorario->horafin}}
     @foreach($dias as $index=>$dia)
    <td style="background: #F5F5F5;" class="text-center align-middle">
     @php ($a = 0)
     @foreach($horarios as $horario)

     @if($horario->dia == $index && $horario->moduloHorario->id == $modulosHorario->id )
     @php ($a++)


    <div class="text-center align-middle p-1 border border-info rounded horarios">
        <div class="align-middle">
    <strong class="mb-1">{{$horario->materia->descripcion}}</strong>
    <p class="mb-3">{{$horario->profesor->apellido}}, {{$horario->profesor->nombre}} </p>
    <p class="mb-3">{{$horario->comentario}}</p>

        {{ Form::model($horario, [ 'method' => 'delete', 'route' => ['horario.destroy', $horario -> id] ]) }}
            @csrf
            <a href="{{ route('horario.edit', ['horario' =>  $horario->id] ) }}" class="btn bg-info">
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
        <div class="text-center px-5 py-4 m-auto border border-info rounded horarios">
        <p class="align-middle px-auto">{{ Form::open(['route' => 'horario.createHorario']) }}</p>

    {{Form::text("sede_id", $sede->id , ["class" => "form-control", "hidden" ])}}
    {{Form::text("carrera_id", $carrera->id , ["class" => "form-control", "hidden" ])}}
    {{Form::text("anio_id", $anio->id , ["class" => "form-control", "hidden" ])}}
    {{Form::text("comision_id", $comision->id , ["class" => "form-control", "hidden" ])}}
    {{Form::text("modulohorario_id", $modulosHorario->id , ["class" => "form-control", "hidden" ])}}
    {{Form::text("dia", $index , ["class" => "form-control", "hidden" ])}}


<button type="submit" class="btn btn-success"><img src="{{ asset('svg/new.svg') }}" height="20" width="20" alt="Crear" title="Enviar"></button></div>
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
