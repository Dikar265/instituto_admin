@extends('frontend.layout.main')

@section('title', 'Horarios por Carreras')
@section('content')

<style>
.container{
    min-height: 80vh;
}
    .texto-tabla {
        font-size: .8em;
    }
   
    th, td{
        width:10rem;
    }
    .table {
    margin-top: 3rem;
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
@media(max-width:1000px){
    .table{
        margin:auto;
    }
}
@media(max-width:850px){
    .table{
        overflow-x: auto;
    }
}
</style>

   <div class="tablaScroll">
<table class="container table texto-tabla mt-4 mb-0">
    <tr class="text-light text-center mb-0" style="background-color: #3A70FF;">
        <th class="text-left" scope="col">HORARIO</th>
        @foreach($dias as $dia)
        <th class="text-left" scope="col">{{$dia}}</th>
        @endforeach
    </tr>
   
     @foreach($modulosHorarios as $modulosHorario)
    <tr><td class="bg-dark text-light text-center align-middle" style="background: #F5F5F5;">{{$modulosHorario->horainicio}} a {{$modulosHorario->horafin}}
     @foreach($dias as $index=>$dia)
    <td style="background: #F5F5F5;" class="">
     @php ($a = 0)  
     @foreach($horarios as $horario)
 
     @if($horario->dia == $index && $horario->moduloHorario->id == $modulosHorario->id )
     @php ($a++)   
    <div class="text-center align-middle p-1">    
    <strong class="h6 mb-1">{{$horario->materia->descripcion}}</strong> <br>
    <strong class="h6 mb-1">{{$horario->sede->descripcion}}</strong>  <br>
    <strong class="h6 mb-1">{{$horario->anio->descripcion}}</strong><br>
    <strong class="h6 mb-1">{{$horario->comision->comision}}</strong>  <br>
    
    <p class="mb-3">{{$horario->profesor->apellido}}, {{$horario->profesor->nombre}} </p>
    <p class="mb-3">{{$horario->comentario}}</p>
    </div>
     @endif 
      @endforeach
      @if($a == 0)
     @php ($a++)  
        <div class="text-center px-5 py-4 m-auto">  
        <p class="align-middle px-auto">{{ Form::open(['route' => 'horario.createHorario']) }}</p>
        </div>
    
{!!Form::close()!!}

        @endif 
     </td>
    @endforeach
    </tr>
@endforeach 
      
    <tr>

 
</table>
</div>
<p class='text-muted text-center mt-1'>Estos horarios podr&iacute;an no ser los oficiales actuales del  Instituto. En caso de duda pregunte al preceptor correspondiente a la carrera.</p>
@endsection
