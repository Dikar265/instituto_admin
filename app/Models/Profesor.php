<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id');
    }
}
