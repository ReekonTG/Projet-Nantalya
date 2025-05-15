<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuiviInfo extends Model
{
    use HasFactory;

    // Spécifier la table si elle ne suit pas la convention (elle doit être en pluriel, donc on précise ici)
    protected $table = 'suiviinfo';

    // Colonnes que tu veux autoriser pour le remplissage
    protected $fillable = [
        'informatique_id',
        'date',
        'nom',
        'organisations',
        'contact',
        'nombre',
        'situation',
        'constatation',
        'date_retour',
        'observation',
    ];

    // Définir la relation entre SuiviInfo et Informatique (si nécessaire)
    public function informatique()
    {
        return $this->belongsTo(Informatique::class);
    }
}
