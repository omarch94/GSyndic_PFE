<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatutReclamation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description'
    ];

    public function reclamations(){
        return $this->hasMany(Reclamation::class, 'statut_reclamation_id', 'id');
    }
}
