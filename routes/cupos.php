<?php

use App\Http\Controllers\CupoController;



/*
|--------------------------------------------------------------------------
| Horario y Módulos horarios                           Aylén, Sofía, Ulises
|--------------------------------------------------------------------------
*/

Route::middleware(['director'])->group(function () {
    Route::resource('cupos', CupoController::class);
});