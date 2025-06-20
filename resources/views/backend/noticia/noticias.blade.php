@extends('backend.layouts.main')
@section('title', __('noticias.index'))
@section('content')
    <style>
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
    @if (Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show">{{ Session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('noticias.create') }}" class="btn btn-success"><img src="{{ asset('svg/new.svg') }}"
                    width="20" height="20" alt="Crear Noticia" title="Crear Noticia"> Crear Noticia</a>
        </div>
        <div class="row"> </div>
        @forelse($noticias as $noticia)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-2">
                        @if ($noticia->imagen)
                            @if (Str::startsWith($noticia->imagen, 'http'))
                                <img src="{{ $noticia->imagen }}" class="card-img-top" alt="...">
                            @else
                                <!-- <img src="{{ asset('./storage/' . $noticia->imagen) }}" class="card-img-top" alt="..."> -->
                                <img src="{{ url('foto_noticia/'. $noticia->imagen) }}" class="card-img-top" alt="...">
                            @endif
                        @else
                            <h5 class="text-center text-muted"> {{ __('noticias.noimg') }} </h5>
                            <hr>
                        @endif
                    </div>
                    <div class="col-md-2">
                        @if ($noticia->imagen2)
                            @if (Str::startsWith($noticia->imagen2, 'http'))
                                <img src="{{ $noticia->imagen2 }}" class="card-img-top" alt="...">
                            @else
                                <!-- <img src="{{ asset('./storage/' . $noticia->imagen2) }}" class="card-img-top"
                                    alt="..."> -->
								<img src="{{ url('foto_noticia/'. $noticia->imagen2) }}" class="card-img-top" alt="...">
                            @endif
                        @else
                            <h5 class="text-center text-muted"> {{ __('noticias.noimg') }} </h5>
                            <hr>
                        @endif

                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title text-primary text-uppercase">{{ $noticia->titulo }}</h3>
                            <p class="card-text text-right">
                                <a href="{{ route('noticias.autor', ['autor' => $noticia->creadaPor->id]) }}">
                                    <small class="text-muted">
                                        {{ $noticia->creadaPor->name }}</small>
                                </a>

                                <small class="text-muted  offset-8">
                                    {{ $noticia->updated_at->toFormattedDateString() }}</small>
                            </p>
                            <p class="card-text">{!! $noticia->cuerpo !!}</p><br />
                            @if ($noticia->archivo1)
                                <span class="badge bg-warning"> <a
                                        href="{{ asset('./storage/' . $noticia->archivo1) }}">{{ basename($noticia->archivo1) }}</a>
                                </span>
                            @endif
                            @if ($noticia->archivo2)
                                <span class="badge bg-warning"> <a
                                        href="{{ asset('./storage/' . $noticia->archivo2) }}">{{ basename($noticia->archivo2) }}</a>
                                </span>
                            @endif
                            @if ($noticia->archivo3)
                                <span class="badge bg-warning"> <a
                                        href="{{ asset('./storage/' . $noticia->archivo3) }}">{{ basename($noticia->archivo3) }}</a>
                                </span>
                            @endif
                            @if ($noticia->deCarrera)
                                <a href="{{ route('noticias.carrera', ['carrera' => $noticia->carrera_id]) }}">
                                    <span class="badge bg-success">{{ $noticia->deCarrera->descripcion }}</span></a>
                            @endif
                            @foreach ($noticia->etiquetas as $e)
                                <a href="{{ route('noticias.etiqueta', ['etiqueta' => $e->id]) }}">
                                    <span class="badge bg-primary">{{ $e->descripcion }}</span></a>
                            @endforeach

                        </div>
                    </div>
                    <div class="card-footer">
                        {{ Form::model($noticia, ['method' => 'delete', 'route' => ['noticias.destroy', $noticia->id]]) }}
                        @csrf
                        <div class="row  offset-md-10">

                            <a href="{{ route('noticias.show', ['noticia' => $noticia->id]) }}"
                                class="btn btn-info col-md-4"><img src="{{ asset('svg/show.svg') }}" width="20"
                                    height="20" alt="{{ __('noticias.mostrar') }}"
                                    title="{{ __('noticias.mostrar') }}"></a>
                            <a href="{{ route('noticias.edit', ['noticia' => $noticia->id]) }}"
                                class="btn btn-primary col-md-4"><img src="{{ asset('svg/edit.svg') }}" width="20"
                                    height="20" alt="{{ __('noticias.editar') }}"
                                    title="{{ __('noticias.editar') }}"></a>
                            <button type="submit" class="btn btn-danger col-md-4  "
                                onclick="if (!confirm('{{ __('noticias.confirmar') }}' )) return false;"><img
                                    src="{{ asset('svg/delete.svg') }}" width="20" height="20"
                                    alt="{{ __('noticias.borrar') }}" title="{{ __('noticias.borrar') }}"></button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-capitalize"> No hay noticias </p>
        @endforelse

    </div>
    <hr>
    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        <!--
                                                      Agregar en App\Providers\AppServiceProvider:
                                                      use Illuminate\Pagination\Paginator;
                                                          public function boot() { Paginator::useBootstrap(); } -->
        {!! $noticias->links() !!}
    </div>
    </div>
@endsection
