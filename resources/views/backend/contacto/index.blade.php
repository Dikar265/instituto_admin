@extends('backend.layouts.main')

@section('title', 'Contacto')

@section('content')

    <nav class="navbar navbar-expand-lg bg-dark">
      <div class="container-md">
        <a class="navbar-brand text-white" href="#">Contacto</a>
      </div>
    </nav>

    <div class="container my-4">

        <div class="card">
        <h5 class="card-header" style=" background-color: #181818; color: white;">Contacto</h5>
        <div class="card-body">
        {{ Form::open(['route' => 'contacto.search']) }}
        <div class="input-group mb-3">

        <div class="input-group mb-3">
            <label class="input-group-text" for="#">Nombre</label>
            {{Form::text("nombre", $nombre->descripcion , ["class" => "form-control", "readonly" ])}}
            {{Form::text("nombre_id", $nombre->id , ["class" => "form-control", "hidden" ])}}
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="#">Email</label>
            {{Form::text("email", $email->email , ["class" => "form-control", "readonly" ])}}
            {{Form::text("email_id", $email->id , ["class" => "form-control", "hidden" ])}}
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="#">Mensaje</label>
            {{Form::text("mensaje", null , ["class" => "form-control" ])}}
        </div>












        </br><button type="submit" style="width: 100%;" class="btn btn-primary">Enviar</button></div>
         {!!Form::close()!!}
    </div>

@endsection
