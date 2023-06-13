<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiment extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'date_paiment',
        'mode_paiment_id',
        'facture_id'
    ];

    public function modePaiment(){
        return $this->belongsTo(ModePaiment::class, 'mode_paiment_id', 'id');
    }

    public function facture(){
        return $this->belongsTo(Facture::class, 'facture_id', 'id');
    }
}
