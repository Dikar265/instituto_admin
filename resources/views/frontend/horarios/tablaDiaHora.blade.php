@extends('frontend.layout.main')
@section('title', 'Horarios por Profesor')

@section('content')
    
<style>

    .texto-tabla {
        font-size: .8em;
    }
    .table {
    margin-top: 3rem;
    
}


label{
    width: 100% !important;
    margin: 1rem 0;
}
input{
    width: 100% !important;
}


</style>


<div class="container" style="heigth:30rem;">

    
        @forelse($horarios as $horario)
        @if($loop->first)
        <table class="table m-o mt-4" style="min-heigth: 30rem;background-color: #3A70FF;margin-bottom: 20rem;">
    <tr class="text-light" style="background-color: #3A70FF;">
            <th class="align-middle ps-5">Horario</th>
            <th class="align-middle">Profesor</th>
            <th class="align-middle">Materia</th>
            <th class="align-middle">Curso</th>
    </tr>
    @endif
        <tr>
            <td class="align-middle ps-5" style="background: #F5F5F5;">{{$horario->moduloHorario->horainicio }} - {{$horario->moduloHorario->horafin}} </td>
            <td class="align-middle" style="background: #F5F5F5;">{{$horario->profesor->nombre}} - {{$horario->profesor->apellido}}</td>
            <td class="align-middle" style="background: #F5F5F5;">{{$horario->carrera->descripcion}}</td>
            <td class="align-middle" style="background: #F5F5F5;">{{$horario->materia->descripcion}}</td>
        </tr>
        @empty
        <p class="text-center text-light  " style="margin:10rem 0;"> Sin horarios!</p>
        @endforelse
</table>



</div>




   
@endsection