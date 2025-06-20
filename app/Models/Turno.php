<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia_hora',
        'dni',
        'carrera_id',
        'hash'
    ];


    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }

}