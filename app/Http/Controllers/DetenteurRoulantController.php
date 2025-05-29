<?php

namespace App\Http\Controllers;

use App\Models\DetenteurRoulant;
use App\Models\Roulant;
use App\Models\InventaireRoulant;
use Illuminate\Http\Request;

class DetenteurRoulantController extends Controller {
    
    public function store(Request $request, Roulant $roulant) {
        $validated = $request->validate([
            'date' => 'required|date',
            'nom' => 'required|string|max:255',
            'organisations' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'nombre' => 'required|integer',
            'situation' => 'required|string|max:255',
            'date_retour' => 'nullable|date',
            'observation' => 'nullable|string',
        ]);

        $validated['roulant_id'] = $roulant->id;
        DetenteurRoulant::create($validated);

        return redirect()->back()->with('success', 'Informations supplémentaires enregistrées avec succès.');
    }

    public function show($id) {
        $roulant = Roulant::findOrFail($id);
        $detenteurs = DetenteurRoulant::where('roulant_id', $id)->get();
        $personnels = \App\Models\Personnel::all(); // Récupérer les noms des personnels
    
        return view('VoirRoulant', compact('roulant', 'detenteurs','personnels'));
    }

    public function inventaire() {
        // Récupérer les roulants avec leurs derniers inventaires
        $roulants = Roulant::with(['inventaireRoulants' => function($query) {
            $query->latest()->first(); // Récupère la dernière situation enregistrée
        }])->select('id', 'numero_inventaire', 'designation', 'numero_serie', 'nature', 'utilisateurs', 'repere')
          ->get();

        return view('InventaireRoulant', compact('roulants'));
    }

    public function ajouter(Request $request, $roulantId) {
        // Vérifier si le roulant existe
        $roulant = Roulant::find($roulantId);
        if (!$roulant) {
            return back()->with('error', 'Roulant introuvable.');
        }
    
        // Valider les données envoyées
        $validated = $request->validate([
            'annee' => 'required|integer',
            'situation' => 'required|string|max:255',
        ]);
    
        // Vérifier si la table `inventaire_roulants` est bien utilisée
        try {
            InventaireRoulant::create([
                'roulant_id' => $roulantId,
                'annee' => $validated['annee'],
                'situation' => $validated['situation'],
            ]);
    
            return redirect()->back()->with('success', 'Données enregistrées avec succès.');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de l\'enregistrement : ' . $e->getMessage());
        }
    }
    // Afficher le formulaire de modification
    public function edit($id)
    {
        $detenteur = DetenteurRoulant::findOrFail($id);
        return view('EditDetenteurRoulant', compact('detenteur')); // Nouvelle vue
    }
    

    //Mettre à jour les informations du détenteur
    public function update(Request $request, $id)
    {

        try {
            $detenteur = DetenteurRoulant::findOrFail($id);
            $detenteur->update($request->all());

            return response()->json(['success' => 'Modification enregistrée avec succès !']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la modification : ' . $e->getMessage()], 500);
        }
        
    }

}
