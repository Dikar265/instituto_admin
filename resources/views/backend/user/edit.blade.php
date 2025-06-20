@extends('backend.layouts.main')
@section('title', 'Usuarios')
@section('content')
<div class="Inicio">
  <div style="position:absolute;top:0;left:30px;cursor:pointer;">
    <a href="{{ route('users.index') }}">
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
      </svg>
    </a>
  </div>
  <h1 class="TextoInicio">Editar Usuario</h1>
</div>
<div>
  @if(Session::has('status'))
  <div class="alert alert-success">{{ Session('status')}}</div>
  @endif
</div>
<div class="links">
  {{ Form::model($user, [ 'method' => 'put' , 'route' => ['users.update', $user->id],  'files' => true]) }}
  @csrf
  <!-- {{ csrf_field() }} -->
  <div class="form-group">
    {{ Form::label("name", 'Nombre', ['class' => 'control-label']) }}
    {{Form::text("name", old("name"), ["class" => "form-control", "placeholder" => "Ingrese el nombre", ])}}
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    {{ Form::label("email", 'Email', ['class' => 'control-label']) }}
    {{Form::text("email", old("email"), ["class" => "form-control", "placeholder" => "Ingrese el email", ])}}
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    {{ Form::label("password", 'Password', ['class' => 'control-label']) }}
    {{Form::password("password", ["class" => "form-control",  "placeholder" => "Ingrese el password"])}}
    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    {{ Form::label("password-confirm", 'Confirm Password', ['class' => 'control-label']) }}
    {{Form::password("password_confirmation", ["class" => "form-control", "placeholder" => "Confirme el password", ])}}
    @error('password-confirm')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group">
      {{ Form::checkbox('is_admin', null, null, ['class' => 'check-input']) }}{{ Form::label("is_admin", 'Admin?', ['class' => 'control-label']) }}
      @error('is_admin')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  </br><button type="submit" class="btn btn-success form-control">{{__('noticias.guardar')}}</button>
</div>
{!!Form::close()!!}
@endsection