<?php

use App\Http\Controllers\CarreraController;
use App\Http\Controllers\CarrerasedeController;
use App\Models\Carrera;
use App\Models\Materia;

/*
|--------------------------------------------------------------------------
| Carrera                                                  | Iván, Martín
|--------------------------------------------------------------------------
*/

Route::get('/carreras', function () {
    $carreras = Carrera::all();
    $materias = Materia::all()->sortBy('anio_id')->sortBy('orden');
    return view('frontend.carreras.index', compact('carreras', 'materias'));
})->name('carreras');
Route::group(['middleware' => ['admin']], function () {
    Route::resource('carrera', CarreraController::class);
});

Route::get('foto_carrera/{carrera}/{id}/{filename}', function ($carrera,$id,$filename) {
         $path = storage_path('app/public/' . $carrera . "/". $id . "/" . $filename);
         //dd( $path );
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    });