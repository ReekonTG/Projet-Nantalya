<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuiviMateriel;

class SuiviMaterielController extends Controller
{
    // Afficher le formulaire de suivi
    public function create()
    {
        return view('suivi.create'); // Assure-toi que la vue existe
    }

    // Enregistrer les données du formulaire
    public function store(Request $request)
    {
        $request->validate([
            'date_suivi' => 'required|date',
            'nom' => 'required|string|max:255',
            'organisme' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'nombre' => 'required|integer',
            'situation' => 'required|string|max:50',
            'constation' => 'required|string|max:255',
            'date_retour' => 'nullable|date', // Permettre la valeur null
            'observation' => 'nullable|string|max:255',
        ]);

        SuiviMateriel::create($request->all());

        return back()->with('success', 'Le suivi a été enregistré avec succès.');
    }

    public function show($id)
{
    // Récupère le matériel spécifique
    $materiel = Suivimateriel::findOrFail($id);

    // Récupère tous les suivis associés au matériel
    $suivis = Suivimateriel::where('materiel_id', $id)->get();

    // Retourne la vue SuiviMateriel en passant les variables
    return view('SuiviMateriel', compact('materiel', 'suivis'));
}

public function update(Request $request, $id)
{
    // Valider les données
    $request->validate([
        'date_suivi' => 'required|date',
        'nom' => 'required|string|max:255',
        'organisme' => 'required|string|max:255',
        'contact' => 'required|string|max:20',
        'nombre' => 'required|integer',
        'situation' => 'required|string|max:50',
        'constation' => 'required|string|max:255',
        'date_retour' => 'nullable|date',
        'observation' => 'nullable|string|max:255',
    ]);

    // Récupérer le suivi à mettre à jour
    $suivi = SuiviMateriel::findOrFail($id);

    // Mettre à jour les données
    $suivi->update($request->all());

    return redirect()->route('suivimateriels.index')->with('success', 'Le suivi a été mis à jour avec succès.');
}


}
