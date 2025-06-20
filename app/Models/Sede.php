<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sedetelefono;

class Sede extends Model
{
    use HasFactory;
 
    public function telefonos(){
    	return $this->hasMany(Sedetelefono::class,'sede_id','id');
    } 

    public function emails(){
    	return $this->hasMany(Sedeemail::class,'sede_id','id');
    }     
}
