@extends('frontend.layout.main')

@section('title', 'Horarios por Carrera')

@section('content')

<style>


body {
  background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
  color: black;
  font-family: 'Montserrat', sans-serif;
}
.input-group-text {
    margin-bottom: 0.5rem;

    background-color: #800000; /* Nuevo color de fondo */
    color: #ffffff;
    border: none;
    border-radius: 10px 0 0 10px;
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
    @media (max-width: 576px) {
    .card {
        margin: 1rem;
        border-radius: 10px;
        max-width: 100%;
    }

    .form-control {
        font-size: 1rem; /* Aumenta el tamaño en pantallas más pequeñas */
    }
}

@media (max-width: 400px) {
    .input-group-text, .form-control {
        font-size: 0.9rem;
    }

    button[type="submit"] {
        padding: 10px;
        font-size: 0.9rem;
    }
}

</style>


<div>
    @if(Session::has('status'))
    <div class="alert alert-success">{{ Session('status')}}</div>
    @endif
</div>

<div class="container" style="display: flex ; align-items: center; justify-content: center">

    <div class="card my-4">
        <h5 class="card-header">HORARIOS POR CARRERA</h5>
        <div class="card-body">
            {{ Form::open(['route' => 'horarios.searchPorCarrera']) }}
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-text">
                    {{ Form::label("sede_id",'Sede', ['class' => 'control-label']) }}
                </div>
                {{Form::select("sede_id", $sedes, null, ["class" => "form-control", "placeholder" => "Seleccione la sede" ]) }}
            </div>
            @error('sede_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="input-group mb-3">
                <div class="input-group-text">
                    {{ Form::label("carrera",'Carrera', ['class' => 'control-label']) }}
                </div>
                {{Form::select("carrera_id", $carreras, null, ["class" => "form-control", "placeholder" => "Seleccione una carrera" ]) }}
            </div>
            @error('carrera_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="input-group mb-3">
                <div class="input-group-text">
                    {{ Form::label("año", 'Año', ['class' => 'control-label']) }}
                </div>
                {{Form::select("anio_id", $anios, null, ["class" => "form-control", "placeholder" => "Seleccione el año" ]) }}
            </div>
            @error('anio_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="input-group mb-3">
                <div class="input-group-text">
                    {{ Form::label("comision",'Comisión', ['class' => 'control-label']) }}
                </div>
                {{Form::select("comision_id", $comisions, null, ["class" => "form-control", "placeholder" => "Seleccione la comisión" ]) }}
            </div>
            @error('comision_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="d-grid gap-2 col my-2 mx-auto">
                <button class="form-control" type="submit">Consultar</button>
            </div>

        </div>
        {!!Form::close()!!}
    </div>
</div>

@endsection