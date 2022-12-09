<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Rayon;
use App\Models\Employe;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rayons = Rayon::pluck('id');
        $faker = Factory::create();
        Employe::factory(4)
        ->create()
        ->each(function ($employe) use ($rayons, $faker) {
        $employe->rayons()->attach($faker->unique()->randomElements($rayons, rand(1,3)));
        });
    }
}
