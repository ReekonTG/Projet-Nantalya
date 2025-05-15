<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suivimateriel extends Model
{
    use HasFactory;

    // La table associée à ce modèle
    protected $table = 'suivimateriels';

    // Les attributs qui sont mass-assignables
    protected $fillable = [
        'date_suivi',
        'nom',
        'organisme',
        'contact',
        'nombre',
        'situation',
        'constation',
        'date_retour',
        'observation',
        'materiel_id',  // N'oubliez pas de l'ajouter ici pour la mass-assignation
    ];

    // Définir la relation avec le modèle Materiel
    public function materiel()
    {
        return $this->belongsTo(Materiel::class, 'materiel_id');
    }
}
