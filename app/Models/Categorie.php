<?php

namespace App\Models;

use App\Models\Instrument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom'
    ];

    public function instruments(){
        return $this->hasMany(Instrument::class);
    }

}
