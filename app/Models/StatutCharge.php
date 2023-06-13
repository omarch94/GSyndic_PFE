<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatutCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description'
    ];

    public function charges(){
        return $this->hasMany(Charge::class, 'statut_charge_id', 'id');
    }
}
