<?php

use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ModuloController;
use App\Models\Profesor;


/*
|--------------------------------------------------------------------------
| Horario y Módulos horarios                           Aylén, Sofía, Ulises
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['admin']], function () {
    Route::resource('modulo', moduloController::class);
    Route::resource('horario', HorarioController::class);
    Route::post('horario/search', [HorarioController::class, 'search'])->name('horario.search');
    Route::get('horario/{sede}/{carrera}/{anio}/{comision}', [HorarioController::class, 'searchCarrera'])->name('horario.search.carrera');
    Route::post('horario/createHorario', [HorarioController::class, 'createHorario'])->name('horario.createHorario');
});

Route::get('/horariosCarrera', [HorarioController::class, 'porCarrera'])->name('horarios.porCarrera');


Route::post('horarios/searchPorCarrera', [HorarioController::class, 'searchCarreraUser'])->name('horarios.searchPorCarrera');
Route::get('horarios/{sede}/{carrera}/{anio}/{comision}', [HorarioController::class, 'searchCarreraUser'])->name('horarios.search.PorCarrera');


Route::get('/horariosProfesor', [HorarioController::class, 'porProfesor'])->name('horarios.porProfesor');

Route::post('/horariosProfesor', [HorarioController::class, 'searchProfesor'])->name('horarios.show.porProfesor');
Route::get('/horariosDiaHora', [HorarioController::class, 'porDiaHora'])->name('horarios.PorDiaHora');
Route::post('/horariosDiaHora', [HorarioController::class, 'searchPorDiaHora'])->name('horarios.searchPorDiaHora');
