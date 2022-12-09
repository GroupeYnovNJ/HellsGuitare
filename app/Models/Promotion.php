<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'coupon',
        'reduction',
        'date_debut',
        'date_fin'
    ];

    public function instruments(){
        return $this->hasMany(Instrument::class);
    }
}
