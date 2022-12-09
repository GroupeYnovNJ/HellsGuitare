<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marque>
 */
class MarqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // guitares : 'Fender', 'Gretsch', 'Hartwood'
        // violon : 'Yamaha', 'Stentor'
        // harpe : 'Tomann'
        // piano : 'Sauter', 'Steingraeber', 'Fazioli', 'Yamaha'
        static $counter = 0;
        $noms = ['Fender', 'Gretsch', 'Hartwood', 'Yamaha', 'Stentor', 'Thomann', 'Sauter', 'Steingraeber', 'Fazioli'];
        return [
            'nom' => $noms[$counter++],
        ];
    }
}
