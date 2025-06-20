<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ExcelControllerLegajo;
use App\Http\Controllers\ExcelControllerListado;
use App\Http\Controllers\ExcelControllerInscrip;

/*
|--------------------------------------------------------------------------
| Excel
|--------------------------------------------------------------------------
*/

Route::middleware(['director'])->group(function () {
    //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos.index');
    // Route::post('/alumnos/buscar', [AlumnoController::class, 'buscar'])->name('alumnos.buscar');
    // Route::post('/alumnos/documentacion/{id}', [AlumnoController::class, 'store_inscp'])->name('alumnos.documentacion');
    // Route::get('/alumno/formulario', function () {
    //     return view('alumno.formulario');
    // })->name('alumno.formulario');

    // Route::post('/alumno/buscar', [AlumnoController::class, 'buscar'])->name('alumno.buscar');
    Route::get('/edit-excel/{id}', [AlumnoController::class, 'edit'])->name('excel.edit');
    Route::get('/exportar-excel', [AlumnoController::class, 'exportarExcel']);
    Route::get('/excel', [AlumnoController::class, 'edit']);
    Route::get('/download', [AlumnoController::class, 'downloadfile']);
    Route::get('/legajo/{id}', [ExcelControllerLegajo::class, 'legajo'])->name('legajo');
    Route::get('/listado/{id}', [ExcelControllerListado::class, 'listado'])->name('listado');
    Route::get('/solic/{id}', [ExcelControllerInscrip::class, 'solic'])->name('solic');
});
Route::get('/pdf', [ExcelControllerInscrip::class, 'pdf']);