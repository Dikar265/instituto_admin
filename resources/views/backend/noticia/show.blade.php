@extends('backend.layouts.main')
@section('title', __('noticias.mostrar'))
@section('content')
    <div class="Inicio">
        <div style="position:absolute;top:0;left:30px;cursor:pointer;">
            <a href="{{ url()->previous() }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black"
                    class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
            </a>

        </div>
        <h1 class="TextoInicio">{{ __('noticias.mostrar') }}</h1>
    </div>

    <div>
        @if (Session::has('status'))
            <div class="alert alert-success">{{ Session('status') }}</div>
        @endif
    </div>
    <div class="links">
        {{ Form::model($noticia, ['method' => 'get', 'route' => ['noticias.show', $noticia->id]]) }}
        <div class="form-group @if ($errors->has('titulo')) has-error has-feedback @endif">
            {{ Form::label(__('noticias.titulo'), null, ['class' => 'control-label', 'for' => 'titulo']) }}
            {{ Form::text('titulo', null, ['class' => 'form-control', 'readonly']) }}
        </div>
        <div class="form-group">
            {{ Form::label(__('noticias.cuerpo'), null, ['class' => 'control-label', 'for' => 'cuerpo']) }}
            {{--  {{ Form::textarea('cuerpo', old('cuerpo'), ['class' => 'form-control', 'readonly']) }}  --}}
            {!! $noticia->cuerpo !!}
        </div>
        <div class="form-group @if ($errors->has('imagen')) has-error has-feedback @endif">
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label(__('noticias.imagen'), null, ['class' => 'control-label', 'for' => 'imagen']) }}
                    @if ($noticia->imagen)
                        @if (Str::startsWith($noticia->imagen, 'http'))
                            <img src="{{ $noticia->imagen }}" class="img-responsive col-md-8" alt="...">
                        @else
                            <!-- <img src="{{ asset('./storage/' . $noticia->imagen) }}" class="img-responsive col-md-8"
                                alt="..."> -->
                                <img src="{{ url('foto_noticia/'. $noticia->imagen) }}" class="img-responsive col-md-8"
                                alt="...">
                                
                        @endif
                    @else
                        <h5 class="text-center text-muted"> No hay imagen disponible </h5>
                        <hr>
                    @endif
                </div>
                <div class="col-md-6">
                    @if ($noticia->imagen2)
                        @if (Str::startsWith($noticia->imagen2, 'http'))
                            <img src="{{ $noticia->imagen2 }}" class="img-responsive col-md-8" alt="...">
                        @else
                            <!-- <img src="{{ asset('./storage/' . $noticia->imagen2) }}" class="img-responsive col-md-8"
                                alt="..."> -->
                                <img src="{{ url('foto_noticia/'. $noticia->imagen2) }}" class="img-responsive col-md-8"
                                alt="...">
                        @endif
                    @else
                        <h5 class="text-center text-muted"> No hay imagen disponible </h5>
                        <hr>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label(__('noticias.autor'), null, ['class' => 'control-label', 'for' => 'autor']) }}
            {{ Form::select('autor', $users, null, ['class' => 'form-control', 'disabled', 'readonly']) }}
        </div>
        <div class="form-group">
            {{ Form::label('carrera_id', __('noticias.carrera'), ['class' => 'control-label']) }}
            {{ Form::select('carrera_id', $carreras, null, ['class' => 'form-control', 'disabled', 'readonly']) }}
        </div>
        <div class="form-group @if ($errors->has('archivo1')) has-error has-feedback @endif">
            {{ Form::label('archivo1', 'Archivos', ['class' => 'control-label']) }}
            @if ($noticia->archivo1)
                <span class="badge badge-warning"><a
                        href="{{ asset('./storage/' . $noticia->archivo1) }}">{{ basename($noticia->archivo1) }}</a>
                </span>
            @endif
            @if ($noticia->archivo2)
                <span class="badge badge-warning"><a
                        href="{{ asset('./storage/' . $noticia->archivo2) }}">{{ basename($noticia->archivo2) }}</a>
                </span>
            @endif
            @if ($noticia->archivo3)
                <span class="badge badge-warning"><a
                        href="{{ asset('./storage/' . $noticia->archivo3) }}">{{ basename($noticia->archivo3) }}</a>
                </span>
            @endif
            @error('archivo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('etiqueta_id', __('noticias.etiquetas'), ['class' => 'control-label']) }}
            @foreach ($etiquetas as $id => $nombre)
                @if ($noticia->etiquetas()->find($id))
                    <div class="form-check form-check-inline">
                        <span class="badge bg-info">
                            {{ Form::checkbox('etiqueta' . $id, $id, 'X', ['class' => 'check-input', 'disabled']) }}{{ Form::label($id, $nombre, ['class' => 'check-label']) }}
                        </span>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    {!! Form::close() !!}
@endsection
