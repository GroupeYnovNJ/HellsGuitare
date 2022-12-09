<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $counter = 0;
        $date_debut = fake()->dateTime;
        $date_fin = fake()->dateTimeInInterval($date_debut,'7 days');
        //$reductions = [5, 15, 0, 10];
        return [
            'coupon' => fake()->text(),
            'reduction' => fake()->numberBetween(5,80),
            'date_debut' =>  $date_debut,
            'date_fin' =>  $date_fin,
        ];
    }
}
