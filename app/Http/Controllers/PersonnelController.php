<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * Affiche le formulaire de création de personnel.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('PersonnelInscription');
    }

    /**
     * Enregistre les données soumises dans la table 'personnels'.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
        ]);

        // Création d'un nouvel enregistrement dans la table personnel
        Personnel::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
        ]);

        // Redirection avec un message de succès
        return redirect()->route('staff.create')->with('success', 'Le personnel a été ajouté avec succès!');
    }

    public function index()
    {
        $personnels = Personnel::all(); // Récupère tous les personnels
        return view('ListePersonnel', compact('personnels')); // Passe la variable à la vue
    }
    
}
