<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residuo extends Model
{
    use HasFactory;
    protected $table = 'residuos';
    protected $primaryKey = 'id';
    protected $fillable = ['residuo_id', 'peso'];

    public function categoriaResiduo() {
        return $this->belongsTo(CategoriasResiduo::class, 'nombre', 'id');
    }

}
