<?php

use App\Http\Controllers\MateriaController;

/*
|--------------------------------------------------------------------------
| Materia                                               | Iván, Martín
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['admin']], function () {
    Route::resource('materia', MateriaController::class);
    Route::get('materia/carrera/{carrera_id}', [MateriaController::class,'filterCarrera'])->name('carrera.materias');
});
