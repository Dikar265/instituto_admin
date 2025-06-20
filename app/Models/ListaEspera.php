<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaEspera extends Model
{
    use HasFactory;

    protected $table = 'lista_espera';
    protected $primaryKey = 'id';
    protected $fillable = ['carrera_id', 'nombre', 'apellido', 'dni', 'telefono', 'tel_alternativo', 'email'];

    public $timestamps = false;

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id', 'id');
    }
}