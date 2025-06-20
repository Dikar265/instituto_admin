@extends('frontend.layout.main')
@section('title', __('noticias.index'))
@section('content')
<div class="container">   
@forelse($noticias as $noticia)
<div class="card mb-3" >
  <div class="row g-0">
    <div class="col-md-4">
    @if($noticia->imagen)
            @if(Str::startsWith($noticia->imagen, 'http'))
              <img src="{{ $noticia->imagen }}" class="card-img-top" alt="...">
            @else
              <img src="{{ asset('./storage/'. $noticia->imagen) }}" class="card-img-top" alt="...">  
            @endif
         @else
          <h5 class="text-center text-muted"> {{ __('noticias.noimg')}} </h5>
          <hr>
         @endif
    </div>
    <div class="col-md-8">
           <div class="card-body">
              <p class="card-text text-right"><small class="text-muted">
                 {{ $noticia->created_at->toFormattedDateString() }}</small></p>            
             <h3 class="card-title text-primary">{{ $noticia->titulo }}</h3>
             @if($noticia->deCarrera) 
             <a href="{{ route('blog.carrera', ['carrera' => $noticia->carrera_id ]) }}">
                <span class="badge badge-success">{{ $noticia->deCarrera->carrera }}</span></a>   
             @endif  
      
              <p class="card-text">{!! $noticia->cuerpo !!}</p>
              @if($noticia->archivo1)
                  <span class="badge bg-warning"> <a href="{{ asset('./storage/'. $noticia->archivo1) }}">{{ basename($noticia->archivo1) }}</a> </span>
              @endif
              @if($noticia->archivo2)
                  <span class="badge bg-warning">  <a href="{{ asset('./storage/'. $noticia->archivo2) }}">{{ basename($noticia->archivo2) }}</a> </span>
              @endif          
              @if($noticia->archivo3)
                  <span class="badge bg-warning">  <a href="{{ asset('./storage/'. $noticia->archivo3) }}">{{ basename($noticia->archivo3) }}</a> </span>
              @endif      
               <br>                           
              @foreach($noticia->etiquetas as $e) 
                <a href="{{ route('blog.etiqueta', ['etiqueta' => $e->id ]) }}">
                <span class="badge bg-primary">{{ $e->descripcion }}</span></a>
              @endforeach
 
           </div>
    </div>
  </div>
</div>
@empty
     <p class="text-capitalize"> No hay noticias </p>
   @endforelse 
   
 </div> 
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