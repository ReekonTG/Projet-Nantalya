<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function index()
    {
        $projet = Projet::all(); // Récupère tous les projets
        return view('projets.index', compact('projets'));
    }
}
