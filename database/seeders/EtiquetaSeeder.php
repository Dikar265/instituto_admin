<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Etiqueta;
use App\Models\Noticia;
use App\Models\User;

class EtiquetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           Etiqueta::factory()->count(20)->create();

           Noticia::chunk(2, function($noticias){

           	foreach ($noticias as $key => $n) {
//           Asignamos entre 1 y 3 etiquetas           		
           		/*$etiquetasRandom = Etiqueta::all()->random(rand(1,3);
           		$n->etiquetas()->saveMany($etiquetasRandom);*/

           		$etiquetasRandom = Etiqueta::all()->random(rand(1,3));
           		$u = User::all()->random()->id;
           		$n->etiquetas()->attach($etiquetasRandom, ['user_id'=> $u ]);
    		    
           	}
       }); 

    }
}
