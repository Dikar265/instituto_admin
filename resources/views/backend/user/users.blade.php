@extends('backend.layouts.main')
@section('title', 'Usuarios')
@section('content')
<div class="descripciones">

  @forelse($users as $user)
  @if($loop->first)
  <table class="table container">
    <tr>
    <tr>
      <th class="align-middle">Usuario</th>
      <th class="align-middle">Email</th>
      <td class="d-flex justify-content-end align-middle">
        <a class="btn btn-success" href="{{ route('users.create') }}">
          <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear" title="Crear">
          Crear Usuario</a>
      </td>
    </tr>
    @endif
    <tr>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
        {{ Form::model($user, [ 'method' => 'delete' , 'route' => ['users.destroy', $user->id] ]) }}
        @csrf
        <a href="{{ route('users.show', ['user' => $user->id ]) }}" class="btn btn-info"><img src="{{ asset('svg/show.svg') }}" width="20" height="20" alt="Mostrar" title="Mostrar"></a>
        <a href="{{ route('users.edit', ['user' => $user->id ]) }}" class="btn btn-primary"><img src="{{ asset('svg/edit.svg') }}" width="20" height="20" alt="Editar" title="Editar"></a>
        <button type="submit" class="btn btn-danger" onclick="if (!confirm('Está seguro de borrar la etiqueta?')) return false;"><img src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar" title="Borrar"></button>
        {!!Form::close()!!}
      </td>
    </tr>
    @if($loop->last)
  </table>
  @endif
  @empty
  <table class="table container">
    <tr>
      <th class="align-middle">Usuario</th>
      <th class="align-middle">Email</th>
      <td class="d-flex justify-content-end align-middle">
        <a class="btn btn-success" href="{{ route('users.create') }}">
          <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear" title="Crear">
          Crear Usuario</a>
      </td>
    </tr>
  </table>
  <p class="text-capitalize container"> No hay usuarios.</p>
  <a class="btn btn-success" href="{{ route('users.create') }}">
    <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear" title="Crear">
    Crear Usuario</a>
  <p class="text-capitalize"> No hay usuarios.</p>
  @endforelse
</div>
<hr>
<!-- Paginación -->
<div class="d-flex justify-content-center">
  <!-- 
  Agregar en App\Providers\AppServiceProvider:
  use Illuminate\Pagination\Paginator;
      public function boot() { Paginator::useBootstrap(); } -->
  {!! $users->links() !!}
</div>
</div>
@endsection