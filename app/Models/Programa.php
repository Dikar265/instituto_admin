<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sede;
use App\Models\Carrera;
use App\Models\Materia;

class Programa extends Model
{
    use HasFactory;
    protected $fillable = [
        'NombreArchivo', 
        'Ruta', 
        'fechaEntrega',
        'Sede_id',
        'Carrera_id',
        'Anio_id',
        'Materia_id',
        'Comision_id',
        'Profesor_id'
    ];
  
    public function sede(){
    	return $this->belongsTo(Sede::class, 'sede_id');
    } 

    public function carrera(){
    	return $this->belongsTo(Carrera::class, 'carrera_id');
    } 

    public function materia(){
    	return $this->belongsTo(Materia::class, 'materia_id');
    } 

    public function anio(){
    	return $this->belongsTo(Anio::class, 'anio_id');
    } 

    public function comision(){
    	return $this->belongsTo(Comision::class, 'comision_id');
    } 

    public function profesor(){
    	return $this->belongsTo(Profesor::class, 'profesor_id');
    } 

}
