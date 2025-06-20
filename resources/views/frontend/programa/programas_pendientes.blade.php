@extends('frontend.layout.main')

@section('title', 'Soporte Digital de Programas')

@section('content')
 
<style>

.algo{
  display:flex;
  justify-content:center;
}

</style>
 
  @foreach($programas as $programa)
{{$programa->sede->descripcion }}
@endforeach  

 <div class="accordion accordion-flush algo" id="accordionFlushExample">
  <div class="accordion-item " >
    <h2  style= "text-align:center" class="accordion-header" id="flush-headingOne"> 
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
     Sede Central San Nicolas de los Arroyos
    </button>

    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <!-- // -->

        <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Carrera
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample2">
      <div class="accordion-body">
      <table class="table table-secondary">
  <thead class="table table-primary">
    <tr>
      <th scope="col">Año</th>
      <th scope="col">Comision</th>
      <th scope="col">Materia</th>
      <th scope="col">Profesor</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th></th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>
      </div>
    </div>
  </div>

        <!-- // -->
      </div>
    </div>
  </div>

</div>
<!-- 
  for
  if 
  for
  for
  if

 -->
@endsection