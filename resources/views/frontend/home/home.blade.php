@extends('frontend.layouts.main')
@section('title', __('noticias.index'))
@section('content')
     @forelse($noticias as $noticia)
       @if($loop->iteration  % 2 != 0)
       <div class="row">    
       @endif
       <div class="col-md-6">
        <div class="card">
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
           <div class="card-body">
              <p class="card-text text-right"><small class="text-muted">
                 {{ $noticia->created_at->toFormattedDateString() }}</small></p>            
             <h3 class="card-title text-info">{{ $noticia->titulo }}</h3>
             @if($noticia->deCarrera) 
             <a href="{{ route('blog.carrera', ['carrera' => $noticia->carrera_id ]) }}">
                <span class="badge badge-success">{{ $noticia->deCarrera->carrera }}</span></a>   
             @endif  
             <a href="{{ route('blog.autor', ['autor' => $noticia->creadaPor->id ]) }}">
             <p class="card-text text-left"><small class="text-muted">
                 {{ $noticia->creadaPor->name}}</small></p></a>      
              <p class="card-text">{!! $noticia->cuerpo !!}</p>
              @if($noticia->archivo1)
                  <span class="badge badge-warning"> <a href="{{ asset('./storage/'. $noticia->archivo1) }}">{{ basename($noticia->archivo1) }}</a> </span>
              @endif
              @if($noticia->archivo2)
                  <span class="badge badge-warning">  <a href="{{ asset('./storage/'. $noticia->archivo2) }}">{{ basename($noticia->archivo2) }}</a> </span>
              @endif          
              @if($noticia->archivo3)
                  <span class="badge badge-warning">  <a href="{{ asset('./storage/'. $noticia->archivo3) }}">{{ basename($noticia->archivo3) }}</a> </span>
              @endif      
               <br>                           
              @foreach($noticia->etiquetas as $e) 
                <a href="{{ route('blog.etiqueta', ['etiqueta' => $e->id ]) }}">
                <span class="badge badge-info">{{ $e->descripcion }}</span></a>
              @endforeach
 
           </div>
         </div>
       </div>
     @if($loop->iteration  % 2 == 0)
      </div><hr>
     @endif
   @empty
     <p class="text-capitalize"> No hay noticias </p>
   @endforelse   
 </div><hr>
<!-- Paginación -->
<div class="d-flex justify-content-center">
<!-- 
  Agregar en App\Providers\AppServiceProvider:
  use Illuminate\Pagination\Paginator;
      public function boot() { Paginator::useBootstrap(); } --> 
      {!! $noticias->links() !!}
</div> 
@endsection