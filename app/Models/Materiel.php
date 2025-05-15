<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;

    // Indiquer les champs autorisés pour l'insertion
    protected $fillable = [
        'numero_inventaire',
        'designation',
        'numero_serie',
        'motifs',
        'date_acquisition',
        'mode_paiement',
        'bc_bl',
        'bailleurs',
        'nature',
        'situations',
        'utilisateurs',
        'repere',
        'cout_unitaire',
        'cout_total',
        'fournisseurs',
    ];

    public function suivis()
    {
        return $this->hasMany(Suivimateriel::class, 'materiel_id');
    }

    public function situationsAnnuelles() {
        return $this->morphMany(SituationAnnuelle::class, 'materiel');
    }
    
}
