<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\User;

class NoticiaEtiqueta extends Pivot
{
    use HasFactory;

    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }
}
