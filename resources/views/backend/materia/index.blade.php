@extends('backend.layouts.main')
@section('title', 'Materias')
@section('content')
    <style>
        * {
            font-family: 'Quicksand', sans-serif;
        }

        .algo {
            text-align: center;
            display: flex;
            justify-content: center;
            width: auto;
        }

        tr {
            height: 100px;
        }

        td {
            display: table-cell;
            vertical-align: middle;
        }

        a {
            margin-left: 10px;
        }

        button {
            margin-left: 10px;
        }

        .subcontainer {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            flex-direction: row;
        }

        a {
            text-decoration: none;
        }

        .horario {
            color: black;
            border: 1px solid black;
            border-radius: 25px;
            padding: 10px;
        }

        .botonera {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            width: 300px;
        }
    </style>
    @if (Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show">{{ Session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @forelse($materias as $materia)
        @if ($loop->first)
            <div class="descripciones">
                <table class="table container">
                    <tr>
                        <div class="algo">
                            <th>Materia</th>
                            <th>Carrera</th>
                            <th>Año</th>
                            <th>Orden</th>
                            <th>Programa</th>
                            <td>
                                <a class="btn btn-success svg" href="{{ route('materia.create') }}">
                                    <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear"
                                        title="Crear">
                                    Crear Materia
                                </a>
                            </td>
                        </div>
                    </tr>
        @endif
        <tr>
            <div class="subcontainer">
                <td>{{ $materia->descripcion }}</td>
                <td>{{ $materia->deCarrera->descripcion }}</td>
                <td>{{ $materia->deAnio->descripcion }}</td>
                <td>{{ $materia->orden }}</td>
                <td>
                    @if ($materia->dePrograma)
                        <span class="badge badge-light"><a
                                href="{{ asset('./storage/' . $materia->contenidos) }}">{{ basename($materia->dePrograma) }}</a>
                        </span>
                    @endif
                </td>
                <td>
                    {{ Form::model($materia, ['method' => 'delete', 'route' => ['materia.destroy', $materia->id]]) }}
                    @csrf
                    <div class="botonera">

                        <a href="{{ route('materia.edit', ['materium' => $materia->id]) }}" class="btn btn-primary svg ">
                            <img src="{{ asset('svg/edit.svg') }}" width="20" height="20" alt="Editar"
                                title="Editar">
                        </a>

                        <button type="submit" name="borrar{{ $materia->id }}" class="btn btn-danger  svg"
                            onclick="if (!confirm('Está seguro de borrar la carrera?')) return false;">
                            <img src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar"
                                title="Borrar">
                        </button>


                    </div>
                    {!! Form::close() !!}
                </td>
            </div>
        </tr>
        @if ($loop->last)
            </table>
        @endif
    @empty
        <div class="descripciones">
            <table class="table container">
                <tr>
                    <div class="algo">
                        <td>Id</td>
                        <td>Materia</td>
                        <td>Carrera</td>
                        <td>Año</td>
                        <td>Programa</td>
                        <td>
                            <a class="btn btn-success svg" href="{{ route('materia.create') }}">
                                <img src="{{ asset('svg/new.svg') }}" width="20" height="20" alt="Crear"
                                    title="Crear">
                                Crear Materia
                            </a>
                        </td>
                    </div>
                </tr>
                <p class="text-capitalize"> No hay materias.</p>
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
@endsection
