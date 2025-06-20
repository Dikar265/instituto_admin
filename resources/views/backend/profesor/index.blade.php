@extends('backend.layouts.main')
@section('title', 'Profesores')
@section('content')
@if(Session::has('status'))
<div class="alert alert-success alert-dismissible fade show">{{ Session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@forelse($profesores as $profesor)
@if($loop->first)
<table class="table m-o container">
    <tr class="text-dark">
        <th class="align-middle ps-5">Nombre</th>
        <th class="align-middle">Apellido</th>
        <td class="d-flex justify-content-end">
            <a href="{{ route('profesor.create') }}" class="btn btn-success">
                <img src="{{ asset('svg/new.svg') }}" height="20" width="20" alt="Crear" title="Crear">
                Crear Profesor
            </a>
        </td>
    </tr>
    @endif
    <tr>
        <td class="align-middle ps-5">{{ $profesor->nombre}}</td>
        <td class="align-middle">{{ $profesor->apellido}}</td>
        <td class="d-flex justify-content-end">
            {{ Form::model($profesores, [ 'method' => 'delete', 'route' => ['profesor.destroy', $profesor -> id] ]) }}
            @csrf
            <a href="{{ route('profesor.edit', ['profesor' => $profesor->id ] ) }}" class="btn btn-primary">
                <img src="{{ asset('svg/edit.svg') }}" width="20" height="20" alt="Editar" title="Editar">
            </a>
            <button type="submit" class="btn btn-danger" onclick="if (!confirm('¿Esta seguro de borrar el profesor?')) return false;">
                <img src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar" title="Borrar">
            </button>
            {!!Form::close()!!}
        </td>
    </tr>
    @if($loop->last)
</table>

@endif
@empty
<table class="table m-o container">
    <tr class="text-dark">
        <th class="align-middle ps-5">Nombre</th>
        <th class="align-middle">Apellido</th>
        <td class="d-flex justify-content-end">
            <a href="{{ route('profesor.create') }}" class="btn btn-success">
                <img src="{{ asset('svg/new.svg') }}" height="20" width="20" alt="Crear" title="Crear">
                Crear Profesor
            </a>
        </td>
    </tr>
</table>
<p class="text-capitalize"> No hay profesores.</p>
@endforelse
</div>

@endsection