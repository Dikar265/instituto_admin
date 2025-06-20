@extends('backend.layouts.main')
@section('title', 'Turnos')
@section('content')
    <div class="container mt-3">
        <div class=" p-3 d-flex justify-content-center">
            <h3>Turnos</h3>
        </div>
        @if (session('deleted'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('deleted') }}
            </div>
        @endif

        @forelse($turnos as $turno)
            @if ($loop->first)
                <table class="table container table-bordered border border-2 border-dark">
                    <thead>
                        <tr>
                            <th class="align-middle">Dia y Hora</th>
                            <th class="align-middle">DNI</th>
                            <th class="align-middle">Carrera</th>
                            @if (Auth::user()->is_admin == 1)
                                <th class="d-flex justify-content-center align-middle">
                                    <a class="btn btn-success" href="{{ route('turnos.create') }}">
                                        <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear"
                                            title="Crear">
                                        Crear Turnos</a>
                                </th>
                            @endif
                        </tr>
                    </thead>
            @endif
            <tbody>
                <tr>
                    <td>{{ date('d-m-Y H:i', strtotime($turno->dia_hora)) }}</td>
                    @if ($turno->dni == null)
                        <td>No asignado</td>
                    @else
                        <td>{{ $turno->dni }}</td>
                    @endif
                    @if ($turno->carrera_id == null)
                        <td>No asignado</td>
                    @else
                        <td>{{ $turno->carrera->descripcion }}</td>
                    @endif
                    @if (Auth::user()->is_admin == 1)
                        <td class="d-flex justify-content-center align-middle">
                            {{ Form::model($turnos, ['method' => 'delete', 'route' => ['turnos.destroy', $turno->id]]) }}
                            @csrf
                            <a href="{{ route('turnos.show', ['turno' => $turno->id]) }}" class="btn btn-info"><img
                                    src="{{ asset('svg/show.svg') }}" width="20" height="20" alt="Mostrar"
                                    title="Mostrar"></a>
                            <a href="{{ route('turnos.edit', ['turno' => $turno->id]) }}" class="btn btn-primary"><img
                                    src="{{ asset('svg/edit.svg') }}" width="20" height="20" alt="Editar"
                                    title="Editar"></a>
                                         @if (Auth::user()->is_admin == 1 )
                            <button type="submit" name="borrar{{ $turno->id }}" class="btn btn-danger"
                                onclick="if (!confirm('Está seguro de borrar el turno?')) return false;"><img
                                    src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar"
                                    title="Borrar"></button>
                                    @endif
                            {!! Form::close() !!}
                        </td>
                    @endif
                </tr>
            </tbody>
            @if ($loop->last)
                </table>
                {!! $turnos->links() !!}
            @endif
        @empty
            <table class="table container">
                <tr>
                    <th class="align-middle">Dia y Hora</th>
                    <th class="align-middle">DNI</th>
                    <th class="align-middle">Carrera</th>
                    <th class="d-flex justify-content-end align-middle">
                        <a class="btn btn-success" href="{{ route('turnos.create') }}">
                            <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear"
                                title="Crear">
                            Crear Turnos</a>
                    </th>
                </tr>
                <tr>
                    <td class="align-middle">No hay turnos creados</td>
                </tr>
            </table>
        @endforelse

    @endsection
