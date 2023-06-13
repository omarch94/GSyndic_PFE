<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description'
    ];

    public function charges(){
        return $this->hasMany(Charge::class, 'type_charge_id', 'id');
    }
}
