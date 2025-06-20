<?php

use App\Http\Controllers\ProgramaController;

/*
|--------------------------------------------------------------------------
| Programa                                         | Alejandro, Brian
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['admin']], function () {
    Route::get('/programa/cargarPrograma', [ProgramaController::class, 'CargarPrograma']);
    Route::post('/programa/search', [ProgramaController::class, 'search'])->name('programa.search');
    Route::post('/programa/programasPendientes/search', [ProgramaController::class, 'ProgramasPendientesSearch'])->name('programa.pendiente.search');
    Route::get('/programa/programasPendientes', [ProgramaController::class, 'ProgramasPendientes']);
    Route::get('programa/search/{periodo}/{sede}/{carrera}/{comision}', [ProgramaController::class, 'searchPrograma'])->name('programa.search.list');
    Route::resource('programa', ProgramaController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profesores', [ProgramaController::class, 'createFront'])->name('programas.create');
    Route::post('/profesores', [ProgramaController::class, 'storeFront'])->name('programas.store');
});

//Route::get('/profesores', [ProgramaController::class, 'createFront'])->name('programas.create');
Route::post('/programas/programasPendientes/search', [ProgramaController::class, 'ProgramasPendientesFrontSearch'])->name('programa.pendiente.search');
Route::get('/programas/programasPendientes', [ProgramaController::class, 'ProgramasPendientesFront']);
Route::get('/programas', [ProgramaController::class, 'programas'])->name('programas');
Route::post('/programas', [ProgramaController::class, 'searchProgramas'])->name('programas.search');
Route::get('/getMaterias/{carrera_id}/{anio_id}/{sede_id}', [ProgramaController::class, 'getMaterias']);
/*Route::get('/getMateriasFront/{carrera_id}/{anio_id}/{sede_id}', [ProgramaController::class, 'getMaterias']);*/
Route::get('/getCarreras/{sede_id}', [ProgramaController::class, 'getCarreras']);
//Route::post('/profesores', [ProgramaController::class, 'storeFront'])->name('programas.store');
