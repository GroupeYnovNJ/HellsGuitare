<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  /*  $noms = [
        ['nom'=>'folk'],['nom'=>'acoustique']
    , ['nom'=>'classique'], 
    ['nom'=>'violoncelle']
    , ['nom'=>'diatonique']
    , ['nom'=>'celtique']
    , ['nom'=>'mexicaine'], 
    ['nom'=>'à queue']
    , ['nom'=>'droit']
    , ['nom'=>'numérique']
    , ['nom'=>'crapaud'],
    ];*/
    Categorie::factory(10)->create();
}
}
