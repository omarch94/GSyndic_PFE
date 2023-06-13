<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModePaiment extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
    ];

    public function paiments(){
        return $this->hasMany(Paiment::class, 'mode_paiment_id', 'id');
    }
}
