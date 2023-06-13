<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_facture',
        'date_emission',
        'date_echeance',
        'montant_total',
        'description',
        'copropriete_id',
        'charge_id',
        'etat_facture_id'
    ];

    public function etatFacture(){
        return $this->belongsTo(EtatFacture::class, 'etat_facture_id', 'id');
    }

    public function charge(){
        return $this->belongsTo(Charge::class, 'charge_id', 'id');
    }

    public function copropriete(){
        return $this->belongsTo(Copropriete::class, 'copropriete_id', 'id');
    }
}
