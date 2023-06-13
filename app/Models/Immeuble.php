<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immeuble extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'code_postal',
        'ville_id',
        'nb_etages',
        'nb_logements',
        'annee_construction',
        'description'
    ];

    public function ville(){
        return $this->belongsTo(Ville::class, 'ville_id', 'id');
    }

    public function coproprietes(){
        return $this->hasMany(Copropriete::class, 'immeuble_id', 'id');
    }

    public function reunions(){
        return $this->hasMany(Reunion::class, 'immeuble_id', 'id');
    }

    public function charges(){
        return $this->hasMany(Charge::class, 'immeuble_id', 'id');
    }
}
