@extends('frontend.layout.main')
@section('content')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>

  body {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    color: black;
    font-family: 'Montserrat', sans-serif;
  }

  .titulo {
    text-align: center;
    color: #ffffff;
    border-top: 10px solid #ffffff;
    margin-bottom: 30px;
    padding-top: 20px;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
  }

  .titulo h1 {
    font-size: 3rem;
    font-weight: 700;
    text-transform: uppercase;
  }

  .carreras {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin: 20px;
  }

  .card {
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    margin: 15px;
    /*min-height: 100vh;*/
  }

  .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
  }

  .imagenCarrera {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
  }

  .card-text {
    display: flex;
    flex-direction: column;
    text-align: center;
    padding: 15px;
  }

  .btn-group {
    margin-top: 20px;
  }

  .botonMateria, .btn.btn-primary, .btn.btn-success {
    padding: 15px 35px;
    border-radius: 50px;
    border: none;
    background-color: #800000; /* Color principal */
    color: #ffffff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .botonMateria:hover, .btn.btn-primary:hover, .btn.btn-success:hover {
    background-color: #d64e5e; /* Color al pasar el ratón */
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
  }

  .modal-content {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    padding: 20px;
  }

  @media (min-width: 768px) {
  .card {
    min-height: 100vh;
  }
 }
  /* Estilos responsive */
  @media (max-width: 768px) {
    .titulo h1 {
      font-size: 2rem;
    }

    .imagenCarrera {
      height: 200px;
    }

    .btn-group .btn {
      padding: 10px 20px;
      font-size: 0.9rem;
    }

    .modal-content {
      padding: 15px;
    }
  }

  @media (max-width: 576px) {
    .card-text {
      padding: 10px;
    }

    .imagenCarrera {
      height: 150px;
    }

    .btn-group .btn {
      padding: 8px 15px;
      font-size: 0.8rem;
    }
  }

.custom-footer {
  background-color: white;
  padding-top: 0px;
  padding-right: 15px;
  padding-bottom: 35px;
  padding-left: 15px;
  font-size: 0.8rem;
}
</style>

<div class="titulo">
  <h1 data-aos="zoom-in-up" class="text-dark">Carreras</h1>
</div>

<div class="carreras">
  <div class="row">
    @foreach ($carreras as $carrera)
    <div class="col-lg-6 col-md-12 mb-3 cards-texto">
      <div class="card shadow-sm roberto" data-aos="{{ $loop->index % 2 == 0 ? 'flip-right' : 'flip-left' }}">
        <!-- <img src="{{ asset('./storage/' . $carrera->imagen) }}" alt="" class="imagenCarrera" loading="lazy"> -->
        <img src="{{ url('foto_carrera/' . $carrera->imagen) }}" alt="" class="imagenCarrera" loading="lazy">
        <div class="card-body">
          <div class="card-text">
            <h4>{{ $carrera->descripcion }}</h4>
            <p>{{ $carrera->texto }}</p>
            <p>Resolución: {{ $carrera->resolucion }}</p>
          </div>
          </div>
          <div class="custom-footer">
          <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="btn-group">
              <button id="{{$carrera->descripcion}}" onClick="reply_click(this.id)" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$carrera->id}}">
                Asignaturas
              </button>
            </div>
            <div class="btn-group">
              <a href="" target="_blank">
                <button data-aos="zoom-in-up" onClick="reply_click(this.id)" type="button" class="btn btn-success">
                  Inscribite!
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@foreach ($carreras as $carrera)
<div class="modal fade" id="staticBackdrop{{$carrera->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>{{ $carrera->descripcion }}</b></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @php($i = 0)
        @foreach ($materias as $materia)
          @if($materia->carrera_id == $carrera->id)
            @if($i <> $materia->anio_id)
              @php($i = $materia->anio_id)
              <h5><b>{{ $materia->deAnio->descripcion }}</b></h5>
            @endif
            <p style="word-wrap: break-word;">{{ $materia->orden }}. {{ $materia->descripcion }}</p>
          @endif
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endforeach

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

@endsection
