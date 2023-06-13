<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resolution extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_resolution',
        'description',
        'reclamation_id',
        'utilisateur_id',//fournisseurs
    ];

    public function reclamation(){
        return $this->belongsTo(Reclamation::class, 'reclamation_id', 'id');
    }

    public function utilisateur(){
        return $this->belongsTo(User::class, 'utilisateur_id', 'id');
    }
}
