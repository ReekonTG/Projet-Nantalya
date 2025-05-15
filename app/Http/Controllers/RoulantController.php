<?php

namespace App\Http\Controllers;

use App\Models\Roulant;
use App\Models\Personnel;
use App\Models\DetenteurRoulant;

use Illuminate\Http\Request;

class RoulantController extends Controller
{
   

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'numero_inventaire' => 'required',
            'designation' => 'required',
            'numero_serie' => 'nullable',
            'date_acquisition' => 'nullable|date',
            'mode_paiement' => 'nullable|string',
            'bc_bl' => 'nullable|string',
            'bailleurs' => 'nullable|string',
            'nature' => 'nullable|numeric', // Assurer que nature soit un nombre
            'situations' => 'nullable|string',
            'utilisateurs' => 'nullable|string',
            'repere' => 'nullable|string',
            'fournisseurs' => 'nullable|string',
            'cout_unitaire' => 'nullable|numeric',
        ]);
    
        // Calculer le cout_total automatiquement
        $cout_unitaire = $request->input('cout_unitaire');
        $nature = $request->input('nature');
        $cout_total = $cout_unitaire * $nature;
    
        // Créer un nouveau roulant avec les données et le cout_total calculé
        Roulant::create([
            'numero_inventaire' => $request->input('numero_inventaire'),
            'designation' => $request->input('designation'),
            'numero_serie' => $request->input('numero_serie'),
            'date_acquisition' => $request->input('date_acquisition'),
            'mode_paiement' => $request->input('mode_paiement'),
            'bc_bl' => $request->input('bc_bl'),
            'bailleurs' => $request->input('bailleurs'),
            'nature' => $nature,
            'situations' => $request->input('situations'),
            'utilisateurs' => $request->input('utilisateurs'),
            'repere' => $request->input('repere'),
            'fournisseurs' => $request->input('fournisseurs'),
            'cout_unitaire' => $cout_unitaire,
            'cout_total' => $cout_total,  // Assigner le calcul du cout_total
        ]);
    

        return redirect()->route('roulants.create')->with('success', 'Enregistrement effectué avec succès.');
    }

    public function index()
{
    $roulants = Roulant::all();  // Récupère tous les roulants de la base de données
    return view('ListeRoulant', compact('roulants'));  // Retourne la vue avec les roulants
}
public function edit($id)
{
    $roulant = Roulant::findOrFail($id);
    return view('EditRoulant', compact('roulant'));
}

public function update(Request $request, $id)
{
    $roulant = Roulant::findOrFail($id);
    $roulant->update($request->all());
    return redirect()->route('roulants.list')->with('success', 'Roulant mis à jour avec succès');
}

public function destroy($id)
{
    $roulant = Roulant::findOrFail($id);  // Récupère le roulant par ID
    $roulant->delete();  // Supprime le roulant
    return redirect()->route('roulants.list')->with('success', 'Roulant supprimé avec succès');
}

public function show($id)
{
    $roulant = Roulant::findOrFail($id); // Récupère le roulant avec l'ID passé
    return view('VoirRoulant', compact('roulant')); // Affiche la vue VoirRoulant
}


public function inventaire()
{
    $roulants = Roulant::select('numero_inventaire', 'designation', 'numero_serie', 'nature', 'utilisateurs', 'repere', 'situations')->get();

    return view('InventaireRoulant', compact('roulants'));
}

public function showDetenteurs($id)
{
    $roulant = Roulant::findOrFail($id);
    $detenteurs = DetenteurRoulant::where('roulant_id', $id)->get();

    return view('DetenteurRoulant', compact('roulant', 'detenteurs'));
}
public function listePersonnels()
{
    $personnels = Personnel::all(); 
  // Récupérer tous les personnels
    return view('Roulants', compact('personnels')); // Passer la variable à la vue
}

}
