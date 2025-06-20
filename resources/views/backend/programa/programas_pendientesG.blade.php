@extends('backend.layouts.main')

@section('title', 'Listado de materias')

@section('content')


<style>

.container{
  width: 100%;
  height: 70%;
}

.Inicio {
        text-align: center;
        margin: 20px;
        color: black;
        font-family: 'Quicksand', sans-serif;
        font-weight: 800;
        position: relative;
    }

  .titulo{
    text-align: center;
  }  

</style>

<div class="Inicio">
    <h1 class="TextoInicio">Programas Pendiente</h1>
</div>

<div class="container">

  <div class="card">
    <h5 class="card-header" style=" background-color: #181818; color: white;">Consulte</h5>
    <div class="card-body">

      {{ Form::open(['route' => 'programa.pendiente.search']) }}
      @csrf

      <div class="form-group">
        {{ Form::label("anio_id", 'Periodo', ['class' => 'control-label']) }}
        {{Form::select("anio_id", $periodos, $periodo, ["class" => "form-select", "placeholder" => "Seleccione un período"]) }}
        @error('año')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        {{ Form::label("sede_id", 'Sede', ['class' => 'control-label']) }}
        {{Form::select("sede_id", $sedes, $sede, ["class" => "form-select", "placeholder" => "Seleccione una sede"]) }}
        @error('sede')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>


      <div class="form-group">
        {{ Form::label("carrera_id", 'Carrera', ['class' => 'control-label']) }}
        {{Form::select("carrera_id", $carreras, $carrera, ["class" => "form-select", "placeholder" => "Seleccione una carrera"]) }}
        @error('carrera')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

      </div>

      <div class="form-group">
        {{ Form::label("comision_id", 'Comisión', ['class' => 'control-label']) }}
        {{Form::select("comision_id", $comisiones, $comision, ["class" => "form-select", "placeholder" => "Seleccione una comisión"]) }}
        @error('carrera')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <hr>

      <div class="d-grid gap-2">
        <button class="btn btn-outline-dark" type="submit" aria-label="consultar">Consultar</button>
      </div>
      <br>
    </div>
  
  </div>

  
  @foreach($anios as $a)
  <h5 class="titulo"> {{$a->descripcion}} <br>
  @php($m=0)
  @php($e=0)
  </h5>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Materia</th>
    </tr>
  </thead>
  </table>

  @foreach($materias as $materia)
  @if($a->id == $materia->anio_id)
  {{$materia->descripcion}}<br>
  @php($m++)


  @foreach($programas as $programa)
  @if($materia->id == $programa->materia_id)

  @php($e++)

  Programa:{{$programa->materia->descripcion}} -{{$programa->profesor->apellido}}, {{$programa->profesor->nombre}}
  <br>  
  @endif

  @endforeach

  @endif

  @endforeach


  @php($p = $m - $e)


  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button class="btn btn-success me-md-2 entregados" type="button">ENTREGADOS:{{$e}}</button>
  <button class="btn btn-danger pendientes" type="button">PENDIENTES:{{$p}}</button>
  </div>

  @endforeach
   
</div>

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Script Get Materias -->
<script type='text/javascript'>

  function search(){
    var sede_id = document.getElementById('sede_id').value;
            //var sede_id = document.getElementById('sede_id').value;
            var carrera_id = document.getElementById('carrera_id').value;
            //$('#carrera_id').find('option').not(':first').remove();
            $('#carrera_id').find('option').remove();
            $('#carrera_id').append($('<option></option>').html('Cargando datos...'));
            $.ajax({
                url: '/getCarreras/' + sede_id,
                type: 'get',
                dataType: 'json',
                success: function(response) {

                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                      $('#carrera_id').find('option').remove();
                      $('#carrera_id').append($('<option></option>').html('Seleccione una carrera...'));
                        for (var i = 0; i < len; i++) {

                            var id = response['data'][i].id;
                            var descripcion = response['data'][i].descripcion;

                            var option = "<option value='" + id + "'>" + descripcion + "</option>";

                            $("#carrera_id").append(option);
                        }
                    }

                }
            });
  }


    $(document).ready(function() {

        $('#sede_id').change(function() {
          search();
            
        });
    });
</script>