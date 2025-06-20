<?php

use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\ObjetivoController;
use App\Models\Historia;
use App\Models\Objetivo;

/*
|--------------------------------------------------------------------------
| Historia                                      | Alejo, Esteban
|--------------------------------------------------------------------------
*/

Route::get('/nosotros', function () {
    $historias = Historia::all();
    $objetivos = Objetivo::all();
    return view('frontend.nosotros.index', compact('historias', 'objetivos'));
})->name('nosotros');
Route::group(['middleware' => ['admin']], function () {
    Route::resource('historia', HistoriaController::class);
    Route::resource('objetivo', ObjetivoController::class);
});
