<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe>
 */
class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       // static $counter = 0;
       // $noms = ['Hoel Frantz', 'Agustine Adenté', 'Joel Feliciti', 'Fleure Deschamp'];
        return [
                'nom' => fake()->lastName(),
                'prenom' => fake()->firstName(),
                'telephone' => fake()->e164PhoneNumber(),
                'email' => fake()->unique()->safeEmail(),
        ];
    }
}
