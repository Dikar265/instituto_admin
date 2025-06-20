@extends('frontend.layout.main')

@section('title', 'Listado de materias')

@section('content')

<style>
  .img2 {
    border-radius: 5px;
    margin-left: 953px;
  }

  .Inicio {
    text-align: center;
    margin: 20px;
    font-family: 'Quicksand', sans-serif;
    font-weight: 800;
    color: white;
  }

  .links {
    padding: 25px;
    width: 70%;
    margin: 0 auto;
  }

  .form-group {
    margin-top: 10px;
  }

  .form-group label {
    outline: none;
    margin-bottom: 5px;
    font-family: 'Quicksand', sans-serif;
    font-weight: 800;
    font-size: 20px;
  }

  .form-select {
    border: 1px solid gray;
    padding: 10px;
    outline: none;
  }

  label {
    width: 6rem;
  }

  @media (max-width: 450px) {

    .card {
      margin: 1rem 1rem 1rem 1rem;

    }
  }

  .links {
    width: 100%;
    height: 70%;

  }

  .accordion {
    width: 100%;

  }

  .accordion-collapse {
    height: auto;
  }

  .card {
    width: 80%;
    margin: auto;
  }

  .accordion {
    width: 80%;
    margin: auto;
  }
</style>

<div>
  @if(Session::has('status'))
  <div class="alert alert-success">{{ Session('status')}}</div>
  @endif
</div>

<div class="Inicio">
  <h1 class="TextoInicio text-dark">Propuestas Pedagógicas</h1>
</div>


<div class="card">
  <form action="./programs/programas/index.php" class="card-header" style=" background-color: #181818; color: white;">
    <h5>Consulta de Propuestas Pedagógicas</h5>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <button class="btn btn btn-light me-md-2"> Propuestas Pedagógicas de años anteriores </button>
    </div>
  </form>
  <div class="card-body">

    {{ Form::open(['route' => 'programas.search']) }}
    @csrf

    <div class="input-group mb-3">
      {{ Form::label("anio_id", 'Período', ['class' => 'input-group-text']) }}
      {{Form::select("anio_id", $periodos, $periodo, ["class" => "form-select", "placeholder" => "Seleccione un período"]) }}
    </div>
    @error('anio_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <div class="input-group mb-3">
      {{ Form::label("sede_id", 'Sede', ['class' => 'input-group-text']) }}
      {{Form::select("sede_id", $sedes, $sede, ["class" => "form-select", "placeholder" => "Seleccione una sede"]) }}
    </div>
    @error('sede_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror



    <div class="input-group mb-3">
      {{ Form::label("carrera_id", 'Carrera', ['class' => 'input-group-text']) }}
      {{Form::select("carrera_id", $carreras, $carrera, ["class" => "form-select", "placeholder" => "Seleccione una carrera"]) }}
    </div>
    @error('carrera_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror



    <div class="input-group mb-3">
      {{ Form::label("comision_id", 'Comisión', ['class' => 'input-group-text']) }}
      {{Form::select("comision_id", $comisiones, $comision, ["class" => "form-select", "placeholder" => "Seleccione una comisión"]) }}
    </div>
    @error('comision_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="d-grid gap-2 col my-2 mx-auto">
      <button class="form-control btn btn-outline-dark" style="margin-top:1rem;" type="submit">Consultar</button>
    </div>


    <br>
  </div>
</div>

<br>


<!-- ACORDEON -->
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    @foreach($anios as $a)
    @php($titulo = $a->descripcion)

    @foreach($programas as $programa)
    @if($a->id == $programa->anio_id)

    @if($titulo)
    <h2 class="accordion-header" id="heading{{$a->id}}">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$a->id}}" aria-expanded="true" aria-controls="collapse{{$a->id}}">
        {{$titulo}} <br>
      </button>

    </h2>
    @endif
    <div id="collapse{{$a->id}}" class="accordion-collapse collapse " aria-labelledby="heading{{$a->id}}" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        @if($titulo)
        <table class="table">
          <thead>
            <tr>
              <th scope="col">MATERIA</th>
              <th scope="col">PROFESOR</th>

            </tr>
          </thead>
          <tbody>
            @endif
            <tr>

              <td><a target="_blank" href="{{asset('./storage/'. $programa->nombrearchivo)}}" style="color:cornflowerblue">{{$programa->materia->descripcion}}</td>
              <td>{{$programa->profesor->apellido}}-{{$programa->profesor->nombre}}</td>
              @if($titulo)
              @csrf
          </tbody>
          {!!Form::close()!!}
          @php($titulo = '')
          @endif
          @endif
          @endforeach
        </table>

      </div>
    </div>
    @endforeach
  </div>


  @endsection

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Script Get Materias -->
  <script type='text/javascript'>
    function validation() {
      var txt1 = document.getElementById('comision_id').value;
      var txt2 = document.getElementById('carrera_id').value;
      var txt3 = document.getElementById('sede_id').value;
      var txt4 = document.getElementById('anio_id').value;
      console.log(txt1);
      if (txt1 != "" &&
        txt2 != "" &&
        txt3 != "" &&
        txt4 != "") {
        $('#boton').prop('disabled', false);
      }
    }



    function search() {
      var sede_id = document.getElementById('sede_id').value;
      //var sede_id = document.getElementById('sede_id').value;
      var carrera_id = document.getElementById('carrera_id').value;
      $('#carrera_id').find('option').not(':first').remove();

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
        validation();
      });
      $('#comision_id').change(function() {
        validation();
      });
      $('#carrera_id').change(function() {
        validation();
      });
      $('#anio_id').change(function() {
        validation();
      });
    });
  </script>