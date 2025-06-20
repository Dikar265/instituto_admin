@extends('frontend.layout.main')

@section('title', 'Horarios por Carreras')
@section('content')

<style>

/* body{
    height: 100vh;
} */
 .input-group-text {
    margin-bottom: 0.5rem;

    background-color: #800000 !important; /* Nuevo color de fondo */
    color: #ffffff;
    border: none;
    border-radius: 10px 0 0 10px;
}
.table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
}

.form-control {
    border: none;
    border-radius: 0 10px 10px 0;
    box-shadow: none;
}

.form-control:focus {
    box-shadow: none;
    border-color: #2a5298;
}

.input-group.mb-3 {
    margin-bottom: 1.5rem;
}
.card {
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: box-shadow 0.3s ease-in-out; /* Solo transición de sombra */
    width: 100%;
    max-width: 600px; /* Aumenta el ancho máximo según lo necesites */
}

.card:hover {
    transform: none; 
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Mantén la sombra original */
}

.card-header {
    background-color: #800000; /* Nuevo color de fondo */
    color: #ffffff;
    text-align: center;
    font-weight: bold;
    padding: 15px;
    border-bottom: none;
}

.card-body {
    font-family: 'Montserrat', sans-serif;

    padding: 20px;
}
button[type="submit"] {
    padding: 15px;
    background-color: #800000; /* Nuevo color de fondo */
    color: #ffffff;
    border: none;
    border-radius: 50px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
}

button[type="submit"]:hover {
    background-color: #d64e5e; /* Color al pasar el ratón */
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
}

.alert {
    font-size: 0.9rem;
    margin-top: 0.5rem;
}

    label {
        width: 4rem;
    }
.container{
    min-height: 80vh;
}
    .texto-tabla {
        font-size: .8em;
        
    }
    
    .table {
    margin-top: 3rem;
}
@media(max-width: 768px) {
    .texto-tabla {
        font-size: 0.7em; /* Reduce el tamaño del texto */
    }
    .table {
        font-size: 0.8rem; /* Ajusta el tamaño del texto */
    }
    th, td {
    white-space: nowrap; /* Evita que el texto se divida en varias líneas */
    overflow: hidden; /* Oculta contenido que no cabe */
    text-overflow: ellipsis; /* Agrega "..." cuando el texto es muy largo */
    padding: 0.25rem; /* Menor padding en celdas */

}

}

@media(max-width:1050px){
.container div{
    flex-direction: column;
    margin: auto;
}
label{
    width: 100% !important;
    margin: 1rem 0;
}
input{
    width: 100% !important;
}

}

.text th, td{
        width:10rem;
    }
    label {
    width: 6rem;
}
</style>

<div class="container">   
        {{ Form::open(['route' => 'horario.createHorario']) }}
        <div class="row mt-4 mb-3 div-cnt">

            <div class="input-group col">
                <label class="input-group-text bg-dark text-light"for="#">Sede</label>
                {{Form::text("sede", $sede->descripcion , ["class" => "form-control", "readonly" ])}}
                {{Form::text("sede_id", $sede->id , ["class" => "form-control", "hidden" ])}}

            </div>

            <div class="input-group col">
                <label class="input-group-text bg-dark text-light" for="#">Carrera</label>
                {{Form::text("carrera", $carrera->descripcion , ["class" => "form-control", "readonly" ])}}
                {{Form::text("carrera_id", $carrera->id , ["class" => "form-control", "hidden" ])}}
            </div>
        </div>

        <div class="row mb-2 div-cnt">
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
    
{!!Form::close()!!}

  <div class="tablaScroll">
  <div class="table-responsive">


<table class="table texto-tabla mb-0">
    <tr class="text-light text-center mb-0" style="background-color: #800000;">
        <th class="text-left" scope="col">HORARIO</th>
        @foreach($dias as $dia)
        <th class="text-left" scope="col">{{$dia}}</th>
        @endforeach
    </tr>
   
     @foreach($modulosHorarios as $modulosHorario)
    <tr><td class="bg-dark text-light text-center align-middle" style="background:#181818">{{$modulosHorario->horainicio}} a {{$modulosHorario->horafin}}
     @foreach($dias as $index=>$dia)
    <td style="background:white;" class="">
     @php ($a = 0)  
     @foreach($horarios as $horario)
 
     @if($horario->dia == $index && $horario->moduloHorario->id == $modulosHorario->id )
     @php ($a++)   
    <div class="text-center align-middle p-1">    
    <strong class="h6 mb-1">{{$horario->materia->descripcion}}</strong>  
    <p class="mb-3">{{$horario->profesor->apellido}}, {{$horario->profesor->nombre}} </p>
    <p class="mb-3">{{$horario->comentario}}</p>
    </div>
     @endif 
      @endforeach
      @if($a == 0)
     @php ($a++)  
        <div class="text-center  py-4 m-auto">  
        <p class="align-middle px-auto">{{ Form::open(['route' => 'horario.createHorario']) }}</p>
        </div>
    {{Form::text("sede_id", $sede->id , ["class" => "form-control", "hidden" ])}}
    {{Form::text("carrera_id", $carrera->id , ["class" => "form-control", "hidden" ])}}
    {{Form::text("anio_id", $anio->id , ["class" => "form-control", "hidden" ])}}
    {{Form::text("comision_id", $comision->id , ["class" => "form-control", "hidden" ])}}
    {{Form::text("modulohorario_id", $modulosHorario->id , ["class" => "form-control", "hidden" ])}}
    {{Form::text("dia", $index , ["class" => "form-control", "hidden" ])}}
{!!Form::close()!!}

        @endif 
     </td>
    @endforeach
    </tr>
@endforeach 
      
    <tr>

 
</table>
</div>

</div>
</div>

<p class='text-muted text-center mt-1 mb-1'>Estos horarios podr&iacute;an no ser los oficiales actuales del  Instituto. En caso de duda pregunte al preceptor correspondiente a la carrera.</p>
@endsection