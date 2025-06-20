@extends('frontend.layout.main')

@section('title', 'Carga de materias')

@section('content')
 <style>
.algo{
  display:flex;
  justify-content:space-between;
  border-radius:70px;
  margin:65px;
}
</style>

<div class="btn-group algo" role="group" aria-label="Basic example">
  <button style="border-radius:60px;" type="button" class="btn btn-success m-2 ">Plantilla para Programas</button>
    
  <button style="border-radius:60px;" type="button" class="btn btn-success m-2">Listado de Programas</button>
  
  <button style="border-radius:60px;" type="button" class="btn btn-success m-2">Programas Pendientes</button>
</div>

<div class="container my-4">
  <div class="card">
    <h5 class="card-header" style=" background-color: #181818; color: white;">Consulte su programa</h5>
    <div class="card-body">

      {{ Form::open(['route' => '']) }}
      @csrf

      <div class="input-group mb-3">
        {{ Form::label("sede_id", 'Sede', ['class' => 'input-group-text']) }}
        {{Form::select("sede_id", $sedes, $sede, ["class" => "form-select", "placeholder" => "Seleccione una sede"]) }}
        @error('sede_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>


      <div class="input-group mb-3">
        {{ Form::label("carrera_id", 'Carrera', ['class' => 'input-group-text']) }}
        {{Form::select("carrera_id", $carreras, $carrera, ["class" => "form-select", "placeholder" => "Seleccione una carrera"]) }}
        @error('carrera_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

      </div>

      <div class="input-group mb-3">
        {{ Form::label("anio_id", 'Año', ['class' => 'input-group-text']) }}
        {{Form::select("anio_id", $anios, $anio, ["class" => "form-select", "placeholder" => "Seleccione un año"]) }}
        @error('anio_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

      </div>

      <div class="input-group mb-3">
        {{ Form::label("materia_id", 'Materia', ['class' => 'input-group-text']) }}
        {{Form::select("materia_id", $materias, $materia, ["class" => "form-select", "placeholder" => "Seleccione una materia"]) }}
        @error('materia_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="input-group mb-3">
        {{ Form::label("comision_id", 'Comisión', ['class' => 'input-group-text']) }}
        {{Form::select("comision_id", $comisiones, $comision, ["class" => "form-select", "placeholder" => "Seleccione una comisión"]) }}
        @error('comision_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>




      <div class="d-grid gap-2 col my-2 mx-auto">
      <button class="form-control btn btn-outline-dark" style="margin-top:1rem;" type="submit">Consultar</button>
    </div>
</div>


@endsection