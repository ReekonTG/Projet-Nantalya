<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetenteurInfo extends Model
{
    use HasFactory;

    protected $table = 'detenteur_info'; // Nom de la table

    protected $fillable = [
        'info_id',
        'date',
        'nom',
        'organisations',
        'contact',
        'nombre',
        'situation',
        'date_retour',
        'observation',
    ];

    // Relation avec la table informatique
    public function informatique()
    {
        return $this->belongsTo(Informatique::class, 'info_id');
    }
}
