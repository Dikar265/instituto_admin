<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carrera;
use App\Models\Anio;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'materia'
    ];

    public function deCarrera(){
    	return $this->belongsTo(Carrera::class, 'carrera_id');
    }

    public function deAnio(){
    	return $this->belongsTo(Anio::class, 'anio_id');
    }

    public function deprograma(){
    	return $this->belongsTo(Programa::class, 'programa_id');
    }
}
