@extends('backend.layouts.main')
@section('title', 'Historia')
@section('content')

<div class="descripciones">
  @forelse($historias as $historia)
  @if($loop->first)

  <table class="table container">
    <tr>
      <th class="align-middle">Historia</th>
      <td class="d-flex justify-content-end align-middle">
        <a class="btn btn-success" href="{{ route('historia.create') }}">
          <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear" title="Crear">
          Crear Historia</a>
      </td>
    </tr>
    @endif
    <tr>
      <td>{!!substr($historia->historia, 0, 150)!!}...</td>
      <td class="d-flex justify-content-end align-middle">

        {{ Form::model($historia, [ 'method' => 'delete' , 'route' => ['historia.destroy', $historia->id] ]) }}
        @csrf
        <a href="{{ route('historia.show', ['historium' => $historia->id ]) }}" class="btn btn-info"><img src="{{ asset('svg/show.svg') }}" width="20" height="20" alt="Mostrar" title="Mostrar"></a>
        <a href="{{ route('historia.edit', ['historium' => $historia->id ]) }}" class="btn btn-primary"><img src="{{ asset('svg/edit.svg') }}" width="20" height="20" alt="Editar" title="Editar"></a>
     {{ Form::model($historia, [ 'method' => 'delete' , 'route' => ['historia.destroy', $historia->id] ]) }}
     @csrf
        <button type="submit" name="borrar{{ $historia->id }}" class="btn btn-danger" onclick="if (!confirm('Está seguro de borrar la historia?')) return false;"><img src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar" title="Borrar"></button>

        {!!Form::close()!!}
      </td>
    </tr>
    @if($loop->last)
  </table>
  @endif
  @empty
  <table class="table container">
    <tr>
      <th class="align-middle">Nombre</th>
      <th class="align-middle">Descripción</th>
      <td class="d-flex justify-content-end align-middle">
        <a class="btn btn-success" href="{{ route('historia.create') }}">
          <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear" title="Crear">
          Crear historia</a>
      </td>
    </tr>
  </table>
  <p class="text-capitalize container"> No hay historia.</p>
  <a class="btn btn-success" href="{{ route('historia.create') }}">
    <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear" title="Crear">
    Crear historia</a>
  <p class="text-capitalize"> No hay historia.</p>
  @endforelse
</div>
<hr>
<!-- Paginación -->
<div class="d-flex justify-content-center">
  <!-- 
  Agregar en App\Providers\AppServiceProvider:
  use Illuminate\Pagination\Paginator;
      public function boot() { Paginator::useBootstrap(); } -->
</div>
</div>
@endsection
