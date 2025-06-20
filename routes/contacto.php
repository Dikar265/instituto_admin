<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\SedeemailController;
use App\Http\Controllers\SedetelefonoController;
use App\Models\Sede;

/*
|--------------------------------------------------------------------------
| Contacto y Sede                                     | Alejo, Esteban
|--------------------------------------------------------------------------
*/

Route::resource('contacto', ContactoController::class);
Route::group(['middleware' => ['admin']], function () {
    Route::resource('sede', SedeController::class);
    Route::resource('sedeemail', SedeemailController::class);
    Route::resource('sedetelefono', SedetelefonoController::class);
});
