<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'nb_produits'
    ];

    public function employes(){
        return $this->belongsToMany(Employe::class);
    }
    
    public function instruments(){
        return $this->hasMany(Instrument::class);
    }
}
