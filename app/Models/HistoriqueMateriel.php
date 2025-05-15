<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueMateriel extends Model
{
    use HasFactory;

    // Nom de la table (facultatif si la table suit la convention Laravel)
    protected $table = 'historique_materiels';

    // Attributs modifiables en masse
    protected $fillable = [
        'materiel_id',
        'date',
        'nom',
        'organisme',
        'contact',
        'nombre',
        'situation',
        'observation',
        'date_retour',
        'observation_retour',
    ];

     // Relation avec le modèle Informatique
    //  public function informatique()
    //  {
        //  return $this->belongsTo(Informatique::class, 'materiel_id');
    //  }
}
