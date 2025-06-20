<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Etiqueta;
use App\Models\NoticiaEtiqueta;
use App\Models\Carrera;

class Noticia extends Model
{
	use SoftDeletes;
    use HasFactory;

	protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'titulo',
        'cuerpo',
        'autor',
    ];

    public static function conImagenes()
    {
       return Noticia::whereNotNull('imagen');     
    }

    public function creadaPor(){
    	return $this->belongsTo(User::class, 'autor');
    }

    public function etiquetas(){
        return $this->belongsToMany(Etiqueta::class, 'noticias_etiquetas')
            ->withPivot('user_id')
            ->withTimestamps()
            ->using(NoticiaEtiqueta::class);
    }

    public function deCarrera(){
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }

}
