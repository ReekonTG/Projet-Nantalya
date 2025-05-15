<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuiviRoulant extends Model
{
    use HasFactory;

    protected $fillable = [
        'roulant_id', 'date_suivi', 'nom', 'organisme', 'contact', 
        'nombre', 'situation', 'constation', 'date_retour', 'observation'
    ];

    public function roulant()
    {
        return $this->belongsTo(Roulant::class);
    }
}

