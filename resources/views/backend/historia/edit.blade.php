@extends('backend.layouts.main')
@section('title', 'Historia')
@section('scripts')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- include libraries(jQuery, bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection

@section('content')
<style>
    .Inicio{
        text-align: center;
        margin:20px;
        font-family: 'Quicksand', sans-serif;
        position:relative;
        font-weight: 800;
    }
    .links{
        padding:25px;
        
        width: 70%;
        margin: 0 auto;
    }
    .form-group{
        margin-top:10px;
    }
    .form-group label{
        outline: none;
        margin-bottom: 5px;
        font-family: 'Quicksand', sans-serif;
        font-weight: 800;
        font-size: 20px;
        
    }
    .form-control{
        border: 1px solid gray;
        padding:10px;
        outline: none;
    }
</style>

<div class="Inicio">
<div style="position:absolute;top:0;left:30px;cursor:pointer;">
<a href="/historia">
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
    </svg>
</a>
</div>
  <h1>Editar Historia</h1>
</div>

  <div>
    @if(Session::has('status'))
    <div class="alert alert-success">{{ Session('status')}}</div>
    @endif
  </div>
  <div class="links">

   {{ Form::model($historia, [ 'method' => 'put' , 'route' => ['historia.update', $historia->id]]) }}
   @csrf
   <div class="form-group">
          {{ Form::label("historia", 'Historia', ['class' => 'control-label']) }}
          {{ Form::textarea("historia", old("historia"), ["class" => "form-control", "name"=>"historia", "id"=>"summernote","placeholder" => "Ingrese la Historia" ]) }}
          @error('historia')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
    </div>
    </br><button type="submit" style="width: 100%;" class="btn btn-primary">Guardar</button>
{!!Form::close()!!}

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 200,
        placeholder: 'Escriba objetivos',
                tabsize: 2,
                toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ]
    });
</script>
@endsection
