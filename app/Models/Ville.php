<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    public function immeubles(){
        return $this->hasMany(Immeuble::class, 'immeuble_id', 'id');
    }

    public function coproprietes(){
        return $this->hasMany(Copropriete::class, 'copropriete_id', 'id');
    }
}
