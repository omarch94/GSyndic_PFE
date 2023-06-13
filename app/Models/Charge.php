<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'date',
        'montant',
        'description',
        'type_charge_id',
        'statut_charge_id',
        'copropriete_id',
    ];

    public function typeCharge(){
        return $this->belongsTo(TypeCharge::class, 'type_charge_id', 'id');
    }

    public function statutCharge(){
        return $this->belongsTo(StatutCharge::class, 'statut_charge_id', 'id');
    }

    public function copropriete(){
        return $this->belongsTo(Copropriete::class, 'copropriete_id', 'id');
    }
}
