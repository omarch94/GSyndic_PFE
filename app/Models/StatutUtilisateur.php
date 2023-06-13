<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatutUtilisateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description'
    ];

    public function utilisateurs(){
        return $this->hasMany(User::class, 'statut_utilisateur_id', 'id');
    }
}
