<?php
/*
|--------------------------------------------------------------------------
| Noticias                                           | Gisela
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\MailController;

Route::group(['middleware' => ['admin']], function () {
    Route::resource('etiquetas', EtiquetaController::class);
    Route::resource('users', UserController::class);
});

Route::middleware(['director'])->group(function () {
    Route::resource('noticias', NoticiaController::class);
});

Route::get('blog', [NoticiaController::class, 'blog'])->name('noticias.blog');
Route::get('blog/noticia/{id}', [NoticiaController::class, 'leerNoticia'])->name('blog.noticias.leer');
Route::get('blog/autor/{autor}/{page?}', [NoticiaController::class, 'porAutorBlog'])->name('blog.autor');
Route::get('blog/etiqueta/{etiqueta}/{page?}', [NoticiaController::class, 'porEtiquetaBlog'])->name('blog.etiqueta');
Route::get('blog/carrera/{carrera}/{page?}', [NoticiaController::class, 'deCarreraBlog'])->name('blog.carrera');

/*
|--------------------------------------------------------------------------
| Filtros: Imágenes, Autores y etiquetas
|--------------------------------------------------------------------------
*/
Route::get('noticias/imagenes/page/{page?}', [NoticiaController::class, 'conImagenesPage'])->name('noticias.imagenes');
Route::get('noticias/autor/{autor}/{page?}', [NoticiaController::class, 'porAutor'])->name('noticias.autor');
Route::get('noticias/etiqueta/{etiqueta}/{page?}', [NoticiaController::class, 'porEtiqueta'])->name('noticias.etiqueta');
Route::get('noticias/carrera/{carrera}/{page?}', [NoticiaController::class, 'deCarrera'])->name('noticias.carrera');

/*
|--------------------------------------------------------------------------
| Autorizaciones
|
| composer require laravel/ui --dev
| php artisan ui bootstrap --auth
| npm install && npm run dev
| Note: Add Bootstrap links in layout/app
| php artisan storage:link  -> para imágenes
| composer require doctrine/dbal   
|--------------------------------------------------------------------------
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');