@extends('backend.layouts.main')

@section('title', 'Módulo horario')

@section('content')
<div class="container-fluid">
    @if(Session::has('status'))
    <div class="alert alert-success alert-dismissible fade show">{{ Session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @forelse($modulos as $modulo)
    @if($loop->first)
    <table class="table m-o container">
        <tr class="text-dark">
            <th class="align-middle ps-5">Hora de inicio</th>
            <th class="align-middle">Hora de finalización</th>
            <th class="align-middle">Duración en minutos</th>
            <td class="d-flex justify-content-end">
                <a href="{{ route('modulo.create') }}" class="btn btn-success">
                    <img src="{{ asset('svg/new.svg') }}" height="20" width="20" alt="Crear" title="Crear">
                    Crear módulo
                </a>
            </td>
        </tr>
        @endif

        <tr>
            <td class="align-middle ps-5">{{ $modulo->horainicio}}</td>
            <td class="align-middle">{{ $modulo->horafin}}</td>
            <td class="align-middle">{{ $modulo->duracion}}</td>
            <td class="d-flex justify-content-end">
                {{ Form::model($modulos, [ 'method' => 'delete', 'route' => ['modulo.destroy', $modulo -> id] ]) }}
                @csrf
                <a href="{{ route('modulo.edit', ['modulo' => $modulo->id ] ) }}" class="btn btn-primary">
                    <img src="{{ asset('svg/edit.svg') }}" width="20" height="20" alt="Editar" title="Editar">
                </a>
                <button type="submit" class="btn btn-danger" onclick="if (!confirm('¿Esta seguro de borrar el módulo?')) return false;">
                    <img src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar" title="Borrar">
                </button>
                {!!Form::close()!!}
            </td>
        </tr>
        @if($loop->last)
    </table>

    @endif
    @empty
    <a href="{{ route('modulo.create') }}" class="btn btn-success">
        <img src="{{ asset('svg/new.svg') }}" height="20" width="20" alt="Crear" title="Crear">
        Crear módulo
    </a>
    @endforelse
</div>

@endsection