@extends('layouts.app')

@section('content')
<div class="row my-4">
    <div class="col-6 mx-auto p-3 bg-white">
        <form class="m-3">
            <div class="mb-3">
                {{ Form::label('carrera', 'Carrera', ['class' => 'col-sm-2 col-form-label']) }}
                {{ Form::select('carrera', $carreras, null, ['class' => 'form-control', 'placeholder' => 'Seleccione carrera...']) }}
            </div>
            <div class="mb-3">
                <label for="" class="col-sm-2 col-form-label">Nombre</label>
                <input type="text" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="col-sm-2 col-form-label">Apellido</label>
                <input type="text" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="col-sm-2 col-form-label">DNI</label>
                <input type="text" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="col-sm-2 col-form-label">Celular</label>
                <div class="row">
                    <div class="col">
                    <input type="text" class="form-control" placeholder="Celular" aria-label="Celular">
                    </div>
                    <div class="col">
                    <input type="text" class="form-control" placeholder="Telefono alternativo" aria-label="Telefono alternativo">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>
@endsection