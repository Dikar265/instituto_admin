@extends('layouts.app')

@section('content')
<div class="row my-4">
    <div class="col-9 mx-auto p-3 d-flex justify-content-center"><h3>Lista de Espera</h3></div>
            <div class="col-9 mx-auto p-3 bg-light">
                {{ Form::open(['route' => 'espera.filtrar']) }}
                    <div class="card-body">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-text">
                                {{ Form::label("carrera_id",'Carrera', ['class' => 'control-label']) }}
                            </div>
                            {{Form::select("carrera_id", $carreras, null, ["class" => "form-control", "placeholder" => "Seleccione la sede" ]) }}
                        </div>
                        @error('carrera_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary me-2">
                            Buscar
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button> 
                {!!Form::close()!!}
                        <a href="{{ route('espera.create') }}"><button type="button" class="btn btn-primary me-2">Crear</button></a>
                        <a href="{{ route('espera.index') }}"><button type="button" class="btn btn-primary">Todos</button></a>
                    </div>
            </div>
    <div class="col-9 mx-auto p-3 bg-white">
     @forelse($espera as $user)
        @if ($loop->first)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">n°</th>
                    <th scope="col">Carrera_id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Telefono Alternativo</th>
                    <th scope="col">Email</th>
                    <th scope="col">Botones</th>
                </tr>
                </thead>
                <tbody>
        @endif
                <tr>
                    <td>{{ $user->id }}</th>
                    <td>{{ $user->carrera->descripcion }}</td>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->apellido }}</td>
                    <td>{{ $user->dni }}</td>
                    <td>{{ $user->telefono }}</th>
                    <td>{{ $user->tel_alternativo }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div style="display: table-cell;vertical-align: middle;">
                            <a href="{{ route('espera.show', $user->id) }}"><button class="btn btn-warning me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg> {{--  Editar  --}}
                            </button></a>
                        </div>
                        <div>
                            {{ Form::model($user, [ 'method' => 'delete' , 'route' => ['espera.destroy', $user->id] ]) }}
                            @csrf  
                            <button type="submit" name="borrar{{$user->id}}" class="btn btn-danger  svg" onclick="if (!confirm('Está seguro de borrar la carrera?')) return false;">
                            <img src="{{ asset('svg/delete.svg') }}" width="20" height="20"  alt="Borrar" title="Borrar">
                            </button>
                        </div>
                        {!!Form::close()!!}  
                     
                    </td>
                </tr>
        @if ($loop->last)
            </tbody>
        </table>
        @endif
        @empty
            <p class="text-capitalize">No hay registros.</p>
        @endforelse
    </div>
</div>
@endsection