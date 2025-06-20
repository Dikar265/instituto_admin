@extends('backend.layouts.main')
@section('title', 'Objetivo')
@section('content')

<div class="descripciones">
  @forelse($objetivos as $objetivo)
  @if($loop->first)

  <table class="table container">
    <tr>
      <th class="align-middle">Objetivo</th>
      <td class="d-flex justify-content-end align-middle">
        <a class="btn btn-success" href="{{ route('objetivo.create') }}">
          <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear" title="Crear">
          Crear Objetivo</a>
      </td>
    </tr>
    @endif
    <tr>
      <td>{!!substr($objetivo->objetivo, 0, 600)!!}...</td>
      <td class="d-flex justify-content-end align-middle">

        {{ Form::model($objetivo, [ 'method' => 'delete' , 'route' => ['objetivo.destroy', $objetivo->id] ]) }}
        @csrf
        <a href="{{ route('objetivo.show', ['objetivo' => $objetivo->id ]) }}" class="btn btn-info"><img src="{{ asset('svg/show.svg') }}" width="20" height="20" alt="Mostrar" title="Mostrar"></a>
        <a href="{{ route('objetivo.edit', ['objetivo' => $objetivo->id ]) }}" class="btn btn-primary"><img src="{{ asset('svg/edit.svg') }}" width="20" height="20" alt="Editar" title="Editar"></a>
     {{ Form::model($objetivo, [ 'method' => 'delete' , 'route' => ['objetivo.destroy', $objetivo->id] ]) }}
     @csrf
        <button type="submit" name="borrar{{ $objetivo->id }}" class="btn btn-danger" onclick="if (!confirm('Está seguro de borrar la objetivo?')) return false;"><img src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar" title="Borrar"></button>

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
        <a class="btn btn-success" href="{{ route('objetivo.create') }}">
          <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear" title="Crear">
          Crear objetivo</a>
      </td>
    </tr>
  </table>
  <p class="text-capitalize container"> No hay objetivo.</p>
  <a class="btn btn-success" href="{{ route('objetivo.create') }}">
    <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear" title="Crear">
    Crear objetivo</a>
  <p class="text-capitalize"> No hay objetivo.</p>
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
