<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    // Si tu as des champs spécifiques à remplir, tu peux les définir ici
    protected $fillable = ['nom', 'prenom'];

    // Lier ce modèle à la table 'personnel' dans la base de données
    protected $table = 'personnel';
}
