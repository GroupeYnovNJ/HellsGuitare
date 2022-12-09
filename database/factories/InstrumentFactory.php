<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instrument>
 */
class InstrumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $counter = 0;
        static $i = 0;
        static $j = 0;
        static $k = 0;
        static $l = 0;
        static $m = 0;
        $noms = ['Guitare', 'Guitare', 'Guitare', 'Violon', 'Violon', 'Harpe', 'Harpe', 'Piano', 'Piano','Piano','Piano'];
        $categories = [1, 2, 3, 3, 4, 5, 6, 7, 8,9, 10];
        $marques = [1, 2, 3, 4, 5, 6, 6, 9, 7,4,4];
        $rayons = [1, 1, 1, 2, 2, 3, 3, 4, 4, 4, 4];     
        $promotions = [1, 1, 1, 2, 2, 3, 3, 4, 4, 4, 4]; 
        //$images = ["uploads/images/Capture d’écran der.png"];
        
            return [
            'nom' => $noms[$counter++],
            'description' => fake()->text(),
            'prix' => fake()->randomFloat(2, 1, 100),
            'stock' => fake()->numberBetween(1,50),
            'image' => fake()->imageUrl(640, 480),
            'categorie_id' => $categories[$i++],
            'rayon_id' => $rayons[$j++],
            'marque_id' => $marques[$k++],
            'promotion_id' => $promotions[$l++],
            ];
            
        
    }
}
