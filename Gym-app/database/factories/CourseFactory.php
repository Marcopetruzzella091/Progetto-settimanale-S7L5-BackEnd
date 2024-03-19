<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { $corsi = ["Bodybuildng",	"Zumba",	"Yoga", 	"Pilates",	"CrossFit"	,"Kickboxing"];
        $fasciaoraria = ['10:00 - 11:00', '12:00-13:00', '14:00-15:00', '16:00-17:00'];
        return [
           

            'nome_corso' => fake()->randomElement($corsi),
            'user_id' => User::get()->random()->id,
            'numero_sala' => $this->faker->numberBetween(1, 10), 
            'data_prenotazione' => $this->faker->date(), 
            'fascia_oraria' => $this->faker->randomElement($fasciaoraria),
        ];
    }
}
