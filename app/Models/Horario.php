<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materia;
use App\Models\Sede;
use App\Models\Carrera;

class Horario extends Model
{
    use HasFactory;

 
    protected $fillable = [
        'comentario'
    ];


    public function materia(){
    	return $this->belongsTo(Materia::class, 'materia_id');
    } 

    public function sede(){
    	return $this->belongsTo(Sede::class, 'sede_id');
    } 

    public function anio(){
    	return $this->belongsTo(Anio::class, 'anio_id');
    } 
    public function carrera(){
    	return $this->belongsTo(Carrera::class, 'carrera_id');
    } 
    public function profesor(){
    	return $this->belongsTo(Profesor::class, 'profesor_id');
    } 
    public function comision(){
    	return $this->belongsTo(Comision::class, 'comision_id');
    } 
 
    public function moduloHorario(){
    	return $this->belongsTo(Modulo::class, 'modulohorario_id');
    } 
    public function comentario(){
    	return $this->belongsTo(Horario::class, 'comentario');
    } 
    
}
