<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventaireInfo extends Model
{
    use HasFactory;

    // Spécifie le nom de la table si ce n'est pas la convention
    protected $table = 'inventaire_infos';

    // Spécifie les colonnes autorisées à être assignées en masse
    protected $fillable = [
        'informatique_id', // Lien avec la table informatique
        'date',             // Date de l'inventaire
        'nom',              // Nom de l'entité ou de la personne
        'organisations',    // Organisation associée
        'contact',          // Contact de l'organisation
        'nombre',           // Nombre d'articles
        'situation',        // Situation des articles
        'constatation',     // Constats faits lors de l'inventaire
        'date_retour',      // Date de retour si applicable
        'observation',      // Observations supplémentaires
    ];

    // Définit la relation avec le modèle Informatique
    public function informatique()
    {
        return $this->belongsTo(Informatique::class, 'informatique_id');
    }
}
