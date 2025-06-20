<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sede;
use App\Models\carrera;
class Comision extends Model
{
    use HasFactory;

    public function sede(){
    	return $this->belongsTo(Sede::class, 'sede_id');
    } 

    public function carrera(){
    	return $this->belongsTo(Carrera::class, 'carrera_id');
    } 
}
