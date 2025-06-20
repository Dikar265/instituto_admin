@extends('backend.layouts.main')
@section('title', 'Etiquetas')
@section('content')
<div class="descripciones">
  @forelse($etiquetas as $etiqueta)
  @if($loop->first)

  <table class="table container">
    <tr>
      <th class="align-middle">Nombre</th>
      <th class="align-middle">Descripción</th>
      <td class="d-flex justify-content-end align-middle">
        <a class="btn btn-success" href="{{ route('etiquetas.create') }}">
          <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear" title="Crear">
          Crear Etiqueta</a>
      </td>
    </tr>
    @endif
    <tr>
      <td>{{ $etiqueta->nombre }}</td>
      <td>{{ $etiqueta->descripcion }}</td>
      <td class="d-flex justify-content-end align-middle">
        {{ Form::model($etiqueta, [ 'method' => 'delete' , 'route' => ['etiquetas.destroy', $etiqueta->id] ]) }}
        @csrf
        <a href="{{ route('etiquetas.show', ['etiqueta' => $etiqueta->id ]) }}" class="btn btn-info"><img src="{{ asset('svg/show.svg') }}" width="20" height="20" alt="Mostrar" title="Mostrar"></a>
        <a href="{{ route('etiquetas.edit', ['etiqueta' => $etiqueta->id ]) }}" class="btn btn-primary"><img src="{{ asset('svg/edit.svg') }}" width="20" height="20" alt="Editar" title="Editar"></a>
        <button type="submit" name="borrar{{ $etiqueta->id }}" class="btn btn-danger" onclick="if (!confirm('Está seguro de borrar la etiqueta?')) return false;"><img src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar" title="Borrar"></button>
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
        <a class="btn btn-success" href="{{ route('etiquetas.create') }}">
          <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear" title="Crear">
          Crear Etiqueta</a>
      </td>
    </tr>
  </table>
  <p class="text-capitalize container"> No hay etiquetas.</p>
  <a class="btn btn-success" href="{{ route('etiquetas.create') }}">
    <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear" title="Crear">
    Crear Etiqueta</a>
  <p class="text-capitalize"> No hay etiquetas.</p>
  @endforelse
</div>
<hr>
<!-- Paginación -->
<div class="d-flex justify-content-center">
  <!-- 
  Agregar en App\Providers\AppServiceProvider:
  use Illuminate\Pagination\Paginator;
      public function boot() { Paginator::useBootstrap(); } -->
  {!! $etiquetas->links() !!}
</div>
</div>
@endsection