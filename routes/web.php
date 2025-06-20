<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//-----   IMPORTANTE!!  -----   IMPORTANTE!!  -----   IMPORTANTE!!   -----//
//  NO modificar web.php, hacer los cambios en los archivos de cada equipo
//  que están en la carpeta routes.
//  Cada archivo tiene el nombre de los responsables.
//                       Gracias! 
//                                              Gisela
//------------------------------------------------------------------------//

// composer require phpoffice/phpspreadsheet
// composer require mpdf/mpdf
// composer require barryvdh/laravel-dompdf
// php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
//composer require setasign/fpdf

//Noticias-> Gisela
Route::group([], __DIR__ . '/blog.php');

//Inicio-> Iván, Martín
Route::group([], __DIR__ . '/inicio.php');

//Carrera-> Iván, Martín
Route::group([], __DIR__ . '/carrera.php');

//Materia-> Iván, Martín
Route::group([], __DIR__ . '/materia.php');

//Programa-> Alejandro, Brian
Route::group([], __DIR__ . '/programa.php');

//Horario y Módulo horario-> Aylén, Sofía, Ulises
Route::group([], __DIR__ . '/horario.php');

//Comision y Año-> Aylén, Sofía, Ulises
Route::group([], __DIR__ . '/comision.php');

//Profesor-> Aylén, Sofía, Ulises
Route::group([], __DIR__ . '/profesor.php');

//Historia y Objetivo-> Alejo, Esteban
Route::group([], __DIR__ . '/historia.php');

//Contacto y Sede-> Alejo, Esteban
Route::group([], __DIR__ . '/contacto.php');

//Inscripciones
Route::group([], __DIR__ . '/turnos.php');

Route::group([], __DIR__ . '/cupos.php');

Route::group([], __DIR__ . '/inscripciones.php');

Route::group([], __DIR__ . '/alumnos.php');

Route::group([], __DIR__ . '/excel.php');

Route::group([], __DIR__ . '/residuos.php');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');