<?php

use App\Http\Controllers\CategoriaResiduoController;
use App\Http\Controllers\ResiduoController;

Route::middleware(['recycler'])->group(function () {
    Route::resource('categoriaresiduos', CategoriaResiduoController::class);
    Route::resource('residuos', ResiduoController::class);
    Route::get('show_mes/{mes}/{anio}', [ResiduoController::class, 'show_mes'])->name('show_mes');
    Route::get('show_anio/{anio}', [ResiduoController::class, 'show_anio'])->name('show_anio');
    Route::get('show_mes_categoria/{mes}/{anio}/{categoria}', [ResiduoController::class, 'show_mes_categoria'])->name('show_mes_categoria');
    Route::get('historico', [ResiduoController::class, 'historico'])->name('historico');
});
/* Route::group(['middleware' => ['admin']], function () {
Route::resource('residuos', CategoriaResiduoController::class);
Route::resource('residuos_peso', ResiduoController::class);
Route::get('show_mes/{mes}', [ResiduoController::class, 'show_mes'])->name('show_mes');
Route::get('show_anio/{anio}', [ResiduoController::class, 'show_anio'])->name('show_anio');
}); */