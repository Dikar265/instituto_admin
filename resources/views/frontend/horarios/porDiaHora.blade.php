@extends('frontend.layout.main')

@section('title', 'Horarios por Día y Hora')

@section('content')

<style>
.card{
    width: 54%;
}
    label {
        width: 4rem;
    }

    @media (max-width: 450px) {
    
    .card{
        margin: 1rem 1rem 1rem 1rem;

    }
    }
    @media (max-width: 380px) {
  
  .card{
    margin: 1rem 1rem 1rem 1rem;

  }
}

  @media (max-width: 400px) {
  
  .card{
    margin: 1rem 1rem 1rem 1rem;

  }

}

</style>

<div class="container" style="display: flex ; align-items: center; justify-content: center">

    <div class="card my-4">
        <h5 class="card-header" style="background-color: #181818; color: white;">Horarios por Día/Hora</h5>
        <div class="card-body">

            {{ Form::open(['route' => 'horarios.searchPorDiaHora']) }}
            @csrf
            <div class="mb-1">
                {{ Form::label("dia",'Día', ['class' => 'control-label']) }}
            </div>
            <div class="input-group mb-3">
                {{Form::select("dias", $dias, null, ["class" => "form-control", "placeholder" => "Seleccione un día"]) }}
            </div>
            @error('dias')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-1">
                {{ Form::label("hora",'Hora', ['class' => 'control-label']) }}
            </div>
            <div class="input-group mb-3">
                {{Form::select("modulohorario_id", $modulohorario, null, ["class" => "form-control", "placeholder" => "Seleccione un módulo", "aria-label" =>"multiple select example"]) }}
            </div>
            @error('modulohorario_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="d-grid gap-2 col my-2 mx-auto">
                <button class="form-control btn btn-outline-dark" style="margin-top:1rem;" type="submit">Consultar</button>
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection