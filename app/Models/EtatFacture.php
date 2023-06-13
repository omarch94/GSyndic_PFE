<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatFacture extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description'
    ];

    public function factures(){
        return $this->hasMany(Facture::class, 'etat_facture_id', 'id');
    }
}
