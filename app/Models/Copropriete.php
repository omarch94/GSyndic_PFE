<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copropriete extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'code_postal',
        'ville_id',
        'interface',
        'nb_lots',
        'date_creation',
        'date_modification',
        'description',
        'immeuble_id',
        'coproprietaire_id',
    ];

    public function ville(){
        return $this->belongsTo(Ville::class, 'ville_id', 'id');
    }

    public function immeuble(){
        return $this->belongsTo(Immeuble::class, 'immeuble_id', 'id');
    }

    public function coproprietaire(){
        return $this->belongsTo(User::class, 'coproprietaire_id', 'id');
    }

    public function reclamations(){
        return $this->hasMany(Reclamation::class, 'copropriete_id', 'id');
    }

    public function charges(){
        return $this->hasMany(Charge::class, 'copropriete_id', 'id');
    }

    public function factures(){
        return $this->hasMany(Facture::class, 'copropriete_id', 'id');
    }
}
