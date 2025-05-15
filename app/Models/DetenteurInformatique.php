<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetenteurInformatique extends Model
{
    //
}
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetenteurInformatique extends Model
{
    protected $fillable = [
        'materiel_id', 'date', 'nom', 'organisations', 'contact', 'nombre', 'situation', 'date_retour', 'observation',
    ];
}
