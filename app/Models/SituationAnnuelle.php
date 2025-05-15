<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituationAnnuelle extends Model {
    use HasFactory;

    protected $fillable = ['materiel_id', 'materiel_type', 'annee', 'localite', 'situation'];

    /**
     * Relation polymorphique : SituationAnnuelle appartient à un matériel (informatique, roulant ou autre).
     */
    public function materiel() {
        return $this->morphTo();
    }
}

