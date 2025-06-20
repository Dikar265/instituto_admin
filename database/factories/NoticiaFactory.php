<?php

namespace Database\Factories;

use App\Models\Noticia;
use App\Models\User;
use App\Models\Carrera;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Noticia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
         $created = $this->faker->dateTimeBetween('-5 years'); 
        //$created = new Carbon('last monday');
        return [
         'titulo' => $this->faker->sentence, 
         'cuerpo' => $this->faker->text(150),
         'imagen' => $this->faker->optional()->imageUrl(400,200),
         'created_at' => $created, 
         'updated_at' => $this->faker->dateTimeBetween($created),
         'autor' => User::all()->random()->id,
         'carrera_id' => Carrera::all()->random()->id,
     ];

    }
}
