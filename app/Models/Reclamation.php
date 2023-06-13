<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'date_reclamation',
        'description',
        'type_reclamation_id',
        'statut_reclamation_id',
        'copropriete_id',
        'canal_id',
        'utilisateur_id',
    ];

    public function typeReclamation(){
        return $this->belongsTo(TypeReclamation::class, 'type_reclamation_id', 'id');
    }

    public function statutReclamation(){
        return $this->belongsTo(StatutReclamation::class, 'statut_reclamation_id', 'id');
    }

    public function canal(){
        return $this->belongsTo(Canal::class, 'canal_id', 'id');
    }

    public function utilisateur(){
        return $this->belongsTo(User::class, 'utilisateur_id', 'id');
    }

    public function copropriete(){
        return $this->belongsTo(Copropriete::class, 'copropriete_id', 'id');
    }

    public function resolutions(){
        return $this->hasMany(Resolution::class, 'reclamation_id', 'id');
    }
}
