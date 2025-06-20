<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'carrera_id',
        'cupos',
        'reservados',
        'inscriptos'
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }
}