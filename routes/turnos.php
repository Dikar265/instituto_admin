<?php

use App\Http\Controllers\TurnoController;
use App\Http\Controllers\ListaEsperaController;
use App\Http\Controllers\CupoController;

/*
|--------------------------------------------------------------------------
| Turnos y Lista de Espera
|--------------------------------------------------------------------------
*/

Route::middleware(['director'])->group(function () {
    Route::resource('turnos', TurnoController::class);
});

Route::middleware(['director'])->group(function () {
    Route::resource('espera', ListaEsperaController::class); /* Bustos - Colacilli */
    Route::post('/espera/filtrar', [ListaEsperaController::class, 'filtrar'])->name('espera.filtrar');
    Route::put('esperaturno/{listaespera}', [ListaEsperaController::class, 'turno'])->name('espera.turno');
    // Route::resource('/cupo', CupoController::class);
// Route::post('/cupo/filtrar', [CupoController::class, 'filtrar'])->name('cupo.filtrar');
});
Route::get('listaespera', [ListaEsperaController::class, 'create_espera'])->name('lista.espera');
Route::post('listaespera', [ListaEsperaController::class, 'store_espera'])->name('lista.espera.store');
