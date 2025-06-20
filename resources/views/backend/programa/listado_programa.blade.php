@extends('backend.layouts.main')

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
</style>
<div>
  @if(Session::has('status'))
  <div class="alert alert-success">{{ Session('status')}}</div>
  @endif
</div>
<div class="Inicio">
  <h1 class="TextoInicio">Listado de programas</h1>
</div>
<a href="{{ route('programa.create') }}" class="btn btn-success img2">
  <img src="{{ asset('svg/new.svg') }}" height="30" width="20" alt="Crear" title="Crear">
  Crear Programa
</a>

<div class="links">

  {{ Form::open(['route' => 'programa.search']) }}
  @csrf

  <div class="form-group">
    {{ Form::label("anio_id", 'Periodo',) }}
    {{Form::select("anio_id", $periodos, $periodo, ["class" => "form-select", "placeholder" => "Seleccione un período"]) }}
  </div>
  @error('anio_id')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror


  <div class="form-group">
    {{ Form::label("sede_id", 'Sede', ) }}
    {{Form::select("sede_id", $sedes, $sede, ["class" => "form-select", "placeholder" => "Seleccione una sede"]) }}
  </div>
  @error('sede_id')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror


  <div class="form-group">
    {{ Form::label("carrera_id", 'Carrera', ) }}
    {{Form::select("carrera_id", $carreras, $carrera, ["class" => "form-select", "placeholder" => "Seleccione una carrera"]) }}
  </div>
  @error('carrera_id')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror



  <div class="form-group">
    {{ Form::label("comision_id", 'Comisión', ) }}
    {{Form::select("comision_id", $comisiones, $comision, ["class" => "form-select", "placeholder" => "Seleccione una comisión"]) }}
  </div>
  @error('comision_id')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror


  <br>

  <div class="d-grid gap-2 col my-2 mx-auto">
    <button class="form-control btn btn-outline-dark" style="margin-top:1rem;" type="submit">Consultar</button>
  </div>
</div>
{!!Form::close()!!}
<br>


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
      @php($titulo = '')
      @endif

    </h2>
    <div id="collapse{{$a->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$a->id}}}" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">MATERIA</th>
              <th scope="col">PROFESOR</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              {{ Form::model($programa, [ 'method' => 'delete' , 'route' => ['programa.destroy', $programa->id] ]) }}

              <td><a target="_blank" href="{{asset('./storage/'. $programa->nombrearchivo)}}">{{$programa->materia->descripcion}}</td>
              <td>{{$programa->profesor->apellido}},{{$programa->profesor->nombre}}</td>

              @csrf
              <td>
                <div class="botonera">
                  <button type="submit" name="borrar{{$programa->id}}" class="btn btn-danger  svg img" onclick="if (!confirm('Está seguro de borrar el programa?')) return false;">
                    <img src="{{ asset('svg/delete.svg') }}" width="20" height="30" alt="Borrar" title="Borrar">
                  </button>

                  <a href="{{ route('programa.edit', ['programa' => $programa->id ]) }}" class="btn btn-primary svg img">
                    <img src="{{ asset('svg/edit.svg') }}" width="20" height="30" alt="Editar" title="Editar">
                  </a>
                </div>
              </td>
          </tbody>
          {!!Form::close()!!}
          @endif
          @endforeach
        </table>
      </div>
    </div>
    @endforeach
  </div>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Script Get Materias -->
<script type='text/javascript'>
  function search() {
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


@endsection
</div>

</div>