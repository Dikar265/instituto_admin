@extends('backend.layouts.main')
@section('title', 'Contacto')
@section('content')
  <div>
    @if(Session::has('status'))
    <div class="alert alert-success">{{ Session('status')}}</div>
    @endif
  </div>
  <div class="links">



{{ Form::model($contactos, [ 'method' => 'put' , 'route' => ['contacto.update', $contacto->id],  'files' => true]) }}


{!!Form::close()!!}
@endsection
