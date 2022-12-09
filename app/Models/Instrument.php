<?php

namespace App\Models;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instrument extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'stock',
        'image',
        'categorie_id',
        'rayon_id',
        'marque_id',
        'promotion_id'  
    ];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    public function marque(){
        return $this->belongsTo(Marque::class);
    }
    public function rayon(){
        return $this->belongsTo(Rayon::class);
    }

    public function promotion(){
        return $this->belongsTo(Promotion::class);
    }


}
