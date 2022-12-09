<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categorie>
 */
class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // guitares : 'folk', 'acoustique', 'classique'
        // violon : 'classique', 'violoncelle'
        // harpe : 'diatonique', 'celtique', 'mexicaine'
        // piano : 'à queue', 'droit', 'numérique', 'crapaud'
        static $counter = 0;
        $noms = ['folk', 'acoustique', 'classique', 'violoncelle', 'diatonique', 'celtique', 'à queue', 'droit', 'numérique', 'crapaud'];
        
            return [
                'nom' => $noms[$counter++],
            ];
    
    }
}
