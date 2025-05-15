<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roulant extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_inventaire',
        'designation',
        'numero_serie',
        'date_acquisition',
        'mode_paiement',
        'bc_bl',
        'bailleurs',
        'nature',
        'situations',
        'utilisateurs',
        'repere',
        'fournisseurs',
        'cout_unitaire',
        'cout_total',
    ];

    public function inventaireRoulants()
{
    return $this->hasMany(InventaireRoulant::class);
}
public function situationsAnnuelles() {
    return $this->morphMany(SituationAnnuelle::class, 'materiel');
}


}

