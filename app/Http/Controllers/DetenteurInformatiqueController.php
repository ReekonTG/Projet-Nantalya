<?php

namespace App\Http\Controllers;

use App\Models\DetenteurInformatique;
use Illuminate\Http\Request;

class DetenteurInformatiqueController extends Controller
{
    public function store(Request $request, $materielId)
    {
        // Validation des données
        $request->validate([
            'date' => 'required|date',
            'nom' => 'required|string',
            'organisations' => 'required|string',
            'contact' => 'required|string',
            'nombre' => 'required|integer',
            'situation' => 'required|string',
            'date_retour' => 'nullable|date',
            'observation' => 'required|string',
        ]);

        // Création d'une nouvelle entrée dans la table detenteur_informatique
        DetenteurInformatique::create([
            'materiel_id' => $materielId,
            'date' => $request->date,
            'nom' => $request->nom,
            'organisations' => $request->organisations,
            'contact' => $request->contact,
            'nombre' => $request->nombre,
            'situation' => $request->situation,
            'date_retour' => $request->date_retour,
            'observation' => $request->observation,
        ]);

        return redirect()->route('materiels.show', $materielId)->with('success', 'Informations supplémentaires ajoutées avec succès !');
    }
}

