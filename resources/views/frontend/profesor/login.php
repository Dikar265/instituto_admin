@extends('backend.layouts.main')

@section('title', 'Login Profesores')

@section('content')

    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-md">
        <a class="navbar-brand" href="#">Ingresar</a>
      </div>
    </nav>

    <div class="container my-4">
    
        <div class="card">
        <h5 class="card-header" style=" background-color: #181818; color: white;">Login</h5>
        <div class="card-body">

        <div class="mb-3">
        <label for="exampleInputUser" class="form-label">Usuario</label>
        <input type="text" class="form-control" id="exampleInputUser" aria-describedby="userHelp">
        </div>

        <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
    
        <div class="d-grid gap-2">
        <button class="btn btn-outline-dark" type="submit" aria-label="consultar">Consultar</button>
        </div>
          
    </div>

@endsection