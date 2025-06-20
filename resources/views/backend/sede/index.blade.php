@extends('backend.layouts.main')
@section('title', 'Sedes')
@section('content')
@forelse($sedes as $sede)
@if($loop->first)
<div class="descripciones">
  <table class="table container">
    <tr>
      <div class="centrar">
        <th>Sede</th>
        <th>Ciudad</th>
        <th>Calle</th>
        <th>Número</th>
        <td>
          <a class="btn btn-success svg" href="{{ route('sede.create') }}">
            <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear" title="Crear">
            Crear Sede
          </a>
        </td>
      </div>
    </tr>
    @endif
    <tr class="table-light">

      <th class="text-primary">{{ $sede->descripcion }}</th>
      <td> {{ $sede->ciudad }} </td>
      <td>{{ $sede->calle }}</td>
      <td>{{ $sede->numero }}</td>
      <td>
        {{ Form::model($sede, [ 'method' => 'delete' , 'route' => ['sede.destroy', $sede->id] ]) }}
        @csrf

        <a href="{{ route('sede.show', ['sede' => $sede->id ]) }}" class="btn btn-info svg">
          <img src="{{ asset('svg/show.svg') }}" width="20" height="20" alt="Mostrar" title="Mostrar">
        </a>
        <a href="{{ route('sede.edit', ['sede' => $sede->id ]) }}" class="btn btn-primary svg ">
          <img src="{{ asset('svg/edit.svg') }}" width="20" height="20" alt="Teléfono" title="Teléfono">
        </a>
        <button type="submit" name="borrar{{$sede->id}}" class="btn btn-danger  svg" onclick="if (!confirm('Está seguro de borrar la sede?')) return false;">
          <img src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar" title="Borrar">
        </button>
        {!!Form::close()!!}
      </td>

    </tr>
    <tr>
      <td>
        {{ Form::open(['route' => 'sedeemail.store']) }}
        @csrf
        <div class="row">
          <div class="col-md-2">
            <button type="submit" name="insemail{{$sede->id}}" class="btn btn-success">
              <img src="{{ asset('svg/mail.svg') }}" width="20" height="20" alt="Nuevo email" title="Nuevo email">
            </button>
          </div>
          <div class="col-md-10">
            {{Form::text("sede_id", $sede->id, ["hidden" => "hidden"])}}
            {{Form::email("email", null, ["class" => "form-control"  ])}}
          </div>
        </div>
        {!!Form::close()!!}
        @foreach($sede->emails as $email)

        {{ Form::model($email, [ 'method' => 'delete' , 'route' => ['sedeemail.destroy', $email->id] ]) }}
        @csrf

        <button type="submit" name="borrar{{$email->id}}" class="btn btn-danger  svg" onclick="if (!confirm('Está seguro de borrar el email?')) return false;">
          <img src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar" title="Borrar">
        </button> {{$email->email}}<br>
        {!!Form::close()!!}
        @endforeach
      </td>
      <td colspan="3">
        {{ Form::open(['route' => 'sedetelefono.store']) }}
        @csrf
        <div class="row">
          <div class="col-md-2">
            <button type="submit" name="instelef{{$sede->id}}" class="btn btn-success  svg">
              <img src="{{ asset('svg/phone.svg') }}" width="20" height="20" alt="Borrar" title="Borrar">
            </button>
          </div>
          <div class="col-md-2">
            {{Form::text("sede_id", $sede->id, ["hidden" => "hidden"])}}
            {{Form::number("caracteristica", null, ["class" => "form-control", "placeholder" => "", ])}}
          </div>
          <div class="col-md-4">
            {{Form::number("numero", null , ["class" => "form-control", "placeholder" => "", ])}}
          </div>

        </div>
        {!!Form::close()!!}
        @foreach($sede->telefonos as $telef)

        {{ Form::model($telef, [ 'method' => 'delete' , 'route' => ['sedetelefono.destroy', $telef->id] ]) }}
        @csrf

        <button type="submit" name="borrar{{$telef->id}}" class="btn btn-danger  svg" onclick="if (!confirm('Está seguro de borrar el teléfono?')) return false;">
          <img src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar" title="Borrar">
        </button> {{$telef->caracteristica}}-{{$telef->numero}}<br>


        {!!Form::close()!!}
        @endforeach
      </td>
      <td></td>
    </tr>
    @if($loop->last)
  </table>
</div>
</div>
@endif
@empty
<div class="descripciones">
  <table class="table container">
    <tr>
      <div class="centrar">
        <th>Sede</th>
        <th>Ciudad</th>
        <th>Calle</th>
        <th>Número</th>
        <td>
          <a class="btn btn-success svg" href="{{ route('sede.create') }}">
            <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear" title="Crear">
            Crear Sede
          </a>
        </td>
      </div>
    </tr>
  </table>
  <p class="text-capitalize container"> No hay sedes.</p>
  @endforelse

  <!-- Paginación -->
  <div class="d-flex justify-content-center">
    <!-- 
  Agregar en App\Providers\AppServiceProvider:
  use Illuminate\Pagination\Paginator;
      public function boot() { Paginator::useBootstrap(); } -->
  </div>
  @endsection