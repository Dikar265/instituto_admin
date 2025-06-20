<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    use HasFactory;
    protected $fillable = [
        'objetivo',
    ];

public function sede(){
    return $this->belongsTo(Sede::class, 'sede_id');
}
}
