<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetenteurRoulant extends Model {
    use HasFactory;

    protected $table = 'detenteurRoulant';
    
    protected $fillable = [
        'roulant_id',
        'date',
        'nom',
        'organisations',
        'contact',
        'nombre',
        'situation',
        'date_retour',
        'observation'
    ];

    public function roulant() {
        return $this->belongsTo(Roulant::class);
    }
}

