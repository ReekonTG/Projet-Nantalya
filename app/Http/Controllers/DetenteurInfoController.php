<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetenteurInfo;
use App\Models\Informatique;

class DetenteurInfoController extends Controller
{
    // Ajouter un détenteur d'information
   // Ajouter un détenteur d'information
public function store(Request $request, $id)
{
    // Vérifier si le dernier détenteur a bien rempli la date de retour et l'observation
    $dernierDetenteur = DetenteurInfo::where('info_id', $id)->latest()->first();

    if ($dernierDetenteur) {
        if (empty($dernierDetenteur->date_retour) || empty($dernierDetenteur->observation)) {
            return redirect()->back()->with('error', 'Le matériel n\'est pas encore disponible.');
        }
    }

    // Validation des informations
    $request->validate([
        'date' => 'required|date',
        'nom' => 'required|string|max:255',
        'organisations' => 'required|string|max:255',
        'contact' => 'required|string|max:255',
        'nombre' => 'required|integer',
        'situation' => 'required|string|max:255',
        'date_retour' => 'nullable|date',
        'observation' => 'nullable|string',
    ]);

    // Enregistrement du nouveau détenteur
    DetenteurInfo::create([
        'info_id' => $id,
        'date' => $request->date,
        'nom' => $request->nom,
        'organisations' => $request->organisations,
        'contact' => $request->contact,
        'nombre' => $request->nombre,
        'situation' => $request->situation,
        'date_retour' => $request->date_retour,
        'observation' => $request->observation,
    ]);

    return redirect()->back()->with('success', 'Informations ajoutées avec succès !');
}


    // Afficher les détenteurs d'un matériel spécifique
    public function show($id)
    {
        $materiel = Informatique::findOrFail($id);
        $detenteurs = DetenteurInfo::where('info_id', $id)->get(); // Correction ici
        $personnels = \App\Models\Personnel::all(); // Récupérer les noms des personnels

        return view('DetenteurFicheInfo', compact('materiel', 'detenteurs', 'personnels'));
    }

    public function edit($id)
        {
            $detenteur = DetenteurInfo::findOrFail($id);
            return view('EditDetenteurInfo', compact('detenteur'));
        }

    // Supprimer un détenteur
    public function destroy($id)
    {
        $detenteur = DetenteurInfo::findOrFail($id);
        $detenteur->delete();

        return redirect()->back()->with('success', 'Détenteur supprimé avec succès !');
    }

    public function update(Request $request, $id)
        {
            $request->validate([
                'date' => 'required|date',
                'nom' => 'required|string|max:255',
                'organisations' => 'required|string|max:255',
                'contact' => 'required|string|max:255',
                'nombre' => 'required|integer',
                'situation' => 'required|string|max:255',
                'date_retour' => 'nullable|date',
                'observation' => 'nullable|string',
            ]);

            $detenteur = DetenteurInfo::findOrFail($id);
            $detenteur->update($request->all());

            return redirect()->route('detenteur-info.show', $detenteur->info_id)->with('success', 'Modification enregistrée avec succès !');
        }

}