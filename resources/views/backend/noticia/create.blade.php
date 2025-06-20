@extends('backend.layouts.main')
@section('title', __('noticias.index'))
@section('scripts')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- include libraries(jQuery, bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endsection
@section('content')
    <style>
        .Inicio {
            text-align: center;
            margin: 20px;
            font-family: 'Quicksand', sans-serif;
            font-weight: 800;
            position: relative;
        }

        .links {
            padding: 25px;
            width: 70%;
            margin: 0 auto;
        }

        .form-group {
            margin-top: 10px;
        }

        .form-group label {
            outline: none;
            margin-bottom: 5px;
            font-family: 'Quicksand', sans-serif;
            font-weight: 800;
            font-size: 20px;

        }

        .form-control {
            border: 1px solid gray;
            padding: 10px;
            outline: none;
        }

        .modal-backdrop, .modal-backdrop.in{
          display: none;
        }
    </style>

    <div class="Inicio">
        <div style="position:absolute;top:0;left:30px;cursor:pointer;">
            <a href="/noticias">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black"
                    class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
            </a>

        </div>
        <h1 class="TextoInicio">{{ __('noticias.nueva') }}</h1>
    </div>
    <div>
        @if (Session::has('status'))
            <div class="alert alert-success">{{ Session('status') }}</div>
        @endif
    </div>

    <div class="links">

        {{ Form::open(['route' => 'noticias.store', 'files' => true]) }}
        @csrf
        <!-- {{ csrf_field() }} -->
        <div class="form-group @if ($errors->has('titulo')) has-error has-feedback @endif">
            {{ Form::label('titulo', __('noticias.titulo'), ['class' => 'control-label']) }}
            {{ Form::text('titulo', old('titulo'), ['class' => 'form-control', 'placeholder' => '']) }}
            @error('titulo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('cuerpo', __('noticias.cuerpo'), ['class' => 'control-label']) }}
            {{--  <textarea name="cuerpo" id="editor">
                {{ old('cuerpo') }}
            </textarea>  
            {{ Form::textarea('cuerpo', old('cuerpo'), ['class' => 'form-control', 'placeholder' => '', 'id' => 'editor']) }} --}}
            {{ Form::textarea('cuerpo', old('cuerpo'), ['class' => 'form-control', 'name' => 'cuerpo', 'id' => 'summernote', 'placeholder' => '']) }}
            @error('cuerpo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group @if ($errors->has('imagen')) has-error has-feedback @endif">
            {{ Form::label('imagen', __('noticias.imagen'), ['class' => 'control-label']) }}
            {{ Form::file('imagen') }}
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group @if ($errors->has('imagen2')) has-error has-feedback @endif">
            {{ Form::label('imagen2', __('noticias.imagen'), ['class' => 'control-label']) }}
            {{ Form::file('imagen2') }}
            @error('image2')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{--  </div>
        <div class="form-group">
            {{ Form::label('autor', __('noticias.autor'), ['class' => 'control-label']) }}
            {{ Form::select('autor', $users, null, ['class' => 'form-control', 'placeholder' => '']) }}  --}}
            {{--  @error('autor')
                <div class="alert alert-danger">{{ $message }}</div>  
        @enderror --}}
            {{--  </div>  --}}
            <div class="form-group">
                {{ Form::label('carrera_id', __('noticias.carrera'), ['class' => 'control-label']) }}
                {{ Form::select('carrera_id', $carreras, null, ['class' => 'form-control', 'placeholder' => '']) }}
                {{--  @error('carrera_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror  --}}
            </div>
            <div class="form-group @if ($errors->has('archivo1')) has-error has-feedback @endif">
                {{ Form::label('archivo1', 'Archivo', ['class' => 'control-label']) }}
                {{ Form::file('archivo1') }}
                @error('archivo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group @if ($errors->has('archivo1')) has-error has-feedback @endif">
                {{ Form::label('archivo2', 'Archivo', ['class' => 'control-label']) }}
                {{ Form::file('archivo2') }}
                @error('archivo2')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group @if ($errors->has('archivo1')) has-error has-feedback @endif">
                {{ Form::label('archivo3', 'Archivo', ['class' => 'control-label']) }}
                {{ Form::file('archivo3') }}
                @error('archivo3')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::label('etiqueta_id', __('noticias.etiquetas'), ['class' => 'control-label']) }}
                @foreach ($etiquetas as $id => $nombre)
                    <div class="form-check form-check-inline">
                        <span class="badge badge-info">
                            {{ Form::checkbox('etiqueta' . $id, $id, null, ['class' => 'check-input']) }}
                            {{ Form::label($id, $nombre, ['class' => 'text-primary']) }}
                        </span>
                    </div>
                @endforeach

            </div>
            </br><button type="submit" class="btn btn-success form-control">{{ __('noticias.guardar') }}</button>
        </div>
        {!! Form::close() !!}
        <script type="text/javascript">
            $('#summernote').summernote({
                height: 200,
                placeholder: 'Escriba cuerpo de la noticia',
                tabsize: 2,
                toolbar: [
            ['style', ['style',]],
            ['font', ['bold', 'italic', 'strikethrough', 'clear',]],
            ['para', ['ul', 'ol']],
            ['insert', ['link']],
            ['misc', ['picture', 'fullscreen', 'codeview', 'print', 'help', ]],
                ]
            });
        </script>
    @endsection
