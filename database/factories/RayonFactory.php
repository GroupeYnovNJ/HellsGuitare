<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rayon>
 */
class RayonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $counter = 0;
        $noms = ['Guitare', 'Violon', 'Harpe', 'Piano'];
        return [
            'nom' => $noms[$counter++],
            'nb_produits' => fake()->numberBetween(1,50),
        ];
    }
}
