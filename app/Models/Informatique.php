<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informatique extends Model
{
    use HasFactory;

    protected $table = 'informatique';

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


    public function historiques()
{
    return $this->hasMany(HistoriqueMateriel::class);
}

public function situationsAnnuelles() {
    return $this->morphMany(SituationAnnuelle::class, 'materiel');
}

public function suiviInfos()
{
    return $this->hasMany(SuiviInfo::class);
}


}
