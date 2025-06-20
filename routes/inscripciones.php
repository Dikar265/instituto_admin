<?php

use App\Http\Controllers\InscripcionController;



/*
|--------------------------------------------------------------------------
| Turnos, cupos e inscripciones                           Roba,Garzón,Vera
|--------------------------------------------------------------------------
*/

//NOTA: SACAR PARA QUE SEA PUBLICO!
 // Route::middleware(['director'])->group(function () {
Route::resource('inscripciones', InscripcionController::class);
Route::get('inscripciones/controlar/dni/{html?}', [InscripcionController::class, 'controlar'])->name('inscripciones.controlar');
Route::get('inscripciones/confirmar/dni', [InscripcionController::class, 'confirmar'])->name('inscripciones.confirmar');
Route::get('inscripciones/cancelar/{hash}', [InscripcionController::class, 'cancelar'])->name('inscripciones.cancelar');
Route::get('inscripciones/cancelar_confirm/{hash}', [InscripcionController::class, 'cancelar_confirm'])->name('turno.destroy');
Route::get('/mostrar', [InscripcionController::class, 'mostrar'])->name('inscripciones.mostrar');
 // });