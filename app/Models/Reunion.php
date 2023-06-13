<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Reunion extends Model
{
    use HasFactory;

    protected $fillable = [
        'sujet',
        'date',
        'heure_debut',
        'heure_fin',
        'description',
        'proces_verbal',
        'immeuble_id',
    ];

    public function immeuble(){
        return $this->belongsTo(Immeuble::class, 'immeuble_id', 'id');
    }


    public function getHeureDebutAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }

    public function getHeureFinAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }
}
