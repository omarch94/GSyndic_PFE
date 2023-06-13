<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeReclamation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description'
    ];

    public function reclamations(){
        return $this->hasMany(Reclamation::class, 'type_reclamation_id', 'id');
    }
}
