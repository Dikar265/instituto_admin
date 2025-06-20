<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Noticia;
use App\Models\Materia;
use App\Models\Sede;

class Carrera extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'descripcion',
    ];  

    public function noticias(){
        return $this->hasMany(Noticia::class, 'carrera_id');
    }

    public function materias(){
        return $this->hasMany(Materia::class, 'carrera_id');
    }

    public function sedes(){
        return $this->belongsToMany(Sede::class, 'carrerasedes')
            ->withTimestamps()
            ->using(Carrerasede::class);
    }

 }
