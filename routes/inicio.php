<?php

use App\Models\Etiqueta;
use App\Models\Carrera;
use App\Models\Historia;
use App\Models\Objetivo;
use App\Http\Controllers\InstagramController;
use App\Services\InstagramService;

/*
|--------------------------------------------------------------------------
| Inicio                                                    | Iván, Martín
|--------------------------------------------------------------------------
*/

Route::get('/', function (InstagramService $instagramController) {
  //$media = $instagramController->getUserMedia();
  // $media = array();
  // $cartelera = array();
  // $c = Etiqueta::where('nombre', 'cartelera')->first();
  // if (!empty($c)) {
  //   $cartelera = $c->cartelera()->get();
  // }
  // return view('frontend.carrousel.novedades', compact('media', 'cartelera'));
	 return redirect()->route('novedades');
})->name('inicio');

Route::get('/novedades', function (InstagramService $instagramController) {
  $novedades = array();
  $e = Etiqueta::where('nombre', 'novedades')->first();
  // $cartelera = array();
  // $c = Etiqueta::where('nombre', 'cartelera')->first();
  $cronograma = array();
  $g = Etiqueta::where('nombre', 'cronograma')->first();
  $carreras = Carrera::all();
  $historias = Historia::all();
  $objetivos = Objetivo::all();
  if (!empty($e)) {
    $novedades = $e->novedades()->get();
  }
  // if (!empty($c)) {
  //   $c = $c->cartelera()->get();
  // }

  if (!empty($g)) {
    $cronograma = $g->cronograma()->get();
  }

  return view('frontend.carrousel.carrousel', compact('novedades', 'carreras', 'historias', 'objetivos', 'cronograma'));

})->name('novedades');

// Route::get('/gisela', function ( InstagramService $instagramController ) {
//   $media = $instagramController->getUserMedia();
//   $cartelera = array();
//   $c = Etiqueta::where('nombre', 'cartelera')->first();
//     if (!empty($c)) {
//    $cartelera  = $c->cartelera()->get();
//   }
//    $novedades = array();
//   $e = Etiqueta::where('nombre', 'novedades')->first();
//   // $cartelera = array();
//   // $c = Etiqueta::where('nombre', 'cartelera')->first();
//   $cronograma = array();
//   $g = Etiqueta::where('nombre', 'cronograma')->first();
//   $carreras = Carrera::all();
//   $historias = Historia::all();
//   $objetivos = Objetivo::all();
//   if (!empty($e)) {
//     $novedades = $e->novedades()->get();
//   }
//   // if (!empty($c)) {
//   //   $c = $c->cartelera()->get();
//   // }

//   if (!empty($g)) {
//     $cronograma = $g->cronograma()->get();
//   }
//   return view('frontend.carrousel.todonovedades', compact('media', 'cartelera', 'novedades', 'carreras', 'historias', 'objetivos', 'cronograma'));
// })->name('gisela');


Route::get('foto_noticia/{noticia}/{id}/{filename}', function ($noticia, $id, $filename) {
  $path = storage_path('app/public/' . $noticia . "/" . $id . "/" . $filename);
  //dd( $path );
  if (!File::exists($path)) {
    abort(404);
  }
  $file = File::get($path);
  $type = File::mimeType($path);
  $response = Response::make($file, 200);
  $response->header("Content-Type", $type);
  return $response;
});