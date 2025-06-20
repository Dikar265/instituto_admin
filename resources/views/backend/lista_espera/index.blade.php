@extends('backend.layouts.main')

@section('content')
    <div class="container">
        <div class=" p-3 d-flex justify-content-center">
            <h3>Lista de Espera</h3>
        </div>
        <div class="mx-auto p-3 bg-light">
            {{ Form::open(['route' => 'espera.filtrar']) }}
            <div class="card-body">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-text">
                        {{ Form::label('carrera_id', 'Carrera', ['class' => 'control-label']) }}
                    </div>
                    {{ Form::select('carrera_id', $carreras, null, ['class' => 'form-control', 'placeholder' => 'Seleccione la carrera']) }}
                </div>
                @error('carrera_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex">
                <button type="submit" class="btn btn-primary me-2">
                    Buscar
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
                {!! Form::close() !!}
                <a href="{{ route('espera.create') }}"><button type="button"
                        class="btn btn-primary me-2">Crear</button></a>
                <a href="{{ route('espera.index') }}"><button type="button" class="btn btn-primary">Todos</button></a>
            </div>
        </div>
        <div class=" mx-auto p-3 bg-white">

            @forelse($espera as $user)
                @if ($loop->first)
                    <table class="table container table-bordered border border-2 border-dark">
                        <thead>
                            <tr>
                                <th scope="col">N° orden</th>
                                <th scope="col">Turno</th>
                                <th scope="col">Carrera</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Telefono</th>

                                <th scope="col">Email</th>
                               @if (Auth::user()->is_admin == 1)  <th scope="col"></th> @endif
                            </tr>
                        </thead>
                        <tbody>
                @endif

                <tr>
                    <td>{{ $loop->iteration }} ({{ $user->id }})</td>
                    <td>@if($user->dia_hora)
                        {{ date('d-m-Y H:i', strtotime($user->dia_hora)) }}
                    @if($user->dia_hora)
                     @if($user->carrera_id <> $user->carrera_id_orig && $user->carrera_id_orig <> '' && $user->carrera_id_orig <> 0 )
                        <mark><b>Turno asignado a otra carrera.</b></mark>
                      @endif
                     @endif
                        @else
                        <a href="{{ route('espera.edit', $user->id) }}" class="btn btn-success">
                                  Turno
                                </a>
                        @endif
                    </td>
                    <td>{{ $user->carrera['descripcion'] }}
                    </td>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->apellido }}</td>
                    <td>{{ $user->dni }}</td>
                    <td><a href="https://wa.me/{{ $user->telefono }}" rel="nofollow noopener noreferrer" target="_blank">{{ $user->telefono }}</a>
                    <br><a href="https://wa.me/{{ $user->tel_alternativo }}" rel="nofollow noopener noreferrer" target="_blank">{{ $user->tel_alternativo }}</a></td>
                    <td>
                    @if($user->dia_hora)
                        <a href="https://mail.google.com/mail/u/0/?source=mailto&to={{ $user->email }}&su=Pre-inscripciones ISFT 38&body=Hola {{$user->nombre}}, Por favor completá tus datos en el siguiente link: /{{$user->hash}} .El turno para presentarte es: {{date('d-m-Y H:i', strtotime($user->dia_hora))}}. Saludos.&fs=1&tf=cm " rel="nofollow noopener noreferrer" target="_blank">{{ $user->email }}</a>
                         @else
                        {{ $user->email }}
                        @endif
                    </td>
                     @if (Auth::user()->is_admin == 1)
                    <td>
                        <div>
                            {{ Form::model($user, ['method' => 'delete', 'route' => ['espera.destroy', $user->id]]) }}

                            @csrf

                            <div>
                                <a href="{{ route('espera.show', $user->id) }}" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg> {{--  Editar  --}}
                                </a>
                            </div>

                            <button type="submit" name="borrar{{ $user->id }}" class="btn btn-danger"
                                onclick="if (!confirm('Está seguro de borrar la Lista de Espera?')) return false;">
                                <img src="{{ asset('svg/delete.svg') }}" width="20" height="20" alt="Borrar"
                                    title="Borrar">
                            </button>

                        </div>
                        {!! Form::close() !!}

                         <div> @endif

                            </div>
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
    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        <!--
                                                                                                      Agregar en App\Providers\AppServiceProvider:
                                                                                                      use Illuminate\Pagination\Paginator;
                                                                                                          public function boot() {
                                                                                                          Paginator::useBootstrap(); } -->
        {{-- {!! $espera->links() !!} --}}
    </div>
@endsection
