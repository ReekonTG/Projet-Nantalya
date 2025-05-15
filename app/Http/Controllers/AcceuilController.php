<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use App\Models\Informatique;
use App\Models\Roulant;

class AcceuilController extends Controller
{
    public function index()
    {
        // Récupérer le nombre d'éléments dans chaque table
        $materielCount = Materiel::count(); // Nombre de matériels
        $informatiqueCount = Informatique::count(); // Nombre d'informatiques
        $roulantCount = Roulant::count(); // Nombre de roulants

        // Passer les données à la vue
        return view('acceuil.index', compact('materielCount', 'informatiqueCount', 'roulantCount'));
    }
}
