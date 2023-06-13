<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
    ];

    public function reclamations(){
        return $this->hasMany(Reclamation::class, 'canal_id', 'id');
    }
}
