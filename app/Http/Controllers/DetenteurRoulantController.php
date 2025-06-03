<?php

namespace App\Http\Controllers;

use App\Models\DetenteurRoulant;
use App\Models\Roulant;
use App\Models\Personnel;
use App\Models\InventaireRoulant;
use Illuminate\Http\Request;

class DetenteurRoulantController extends Controller
{
    public function store(Request $request, Roulant $roulant)
    {
        // Vérifier si le dernier détenteur a bien rempli la date de retour et l'observation
        $dernierDetenteur = DetenteurRoulant::where('roulant_id', $roulant->id)->latest()->first();

        if ($dernierDetenteur && (empty($dernierDetenteur->date_retour) || empty($dernierDetenteur->observation))) {
            return redirect()->back()->with('error', 'Le matériel n\'est pas encore disponible (date de retour ou observation manquante).');
        }

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

        return redirect()->route('roulants.detenteurs', ['id' => $roulant->id])
                         ->with('success', 'Informations supplémentaires enregistrées avec succès.');
    }

    public function show($id)
        {
            $roulant = Roulant::findOrFail($id);
            //$detenteurs = DetenteurRoulant::where('roulant_id', $id)->get();
            $personnels = Personnel::all(); // ou ta logique pour récupérer les personnels

            return view('voir_roulant', compact('roulant','personnels'));
        }


    public function inventaire()
    {
        // Utilise une relation dédiée 'dernierInventaire' dans le modèle Roulant
        $roulants = Roulant::with('dernierInventaire')
            ->select('id', 'numero_inventaire', 'designation', 'numero_serie', 'nature', 'utilisateurs', 'repere')
            ->get();

        return view('inventaire_roulant', compact('roulants'));
    }

    public function ajouter(Request $request, $roulantId)
    {
        $roulant = Roulant::find($roulantId);
        if (!$roulant) {
            return back()->with('error', 'Roulant introuvable.');
        }

        $validated = $request->validate([
            'annee' => 'required|integer',
            'situation' => 'required|string|max:255',
        ]);

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

    public function edit($id)
    {
        $detenteur = DetenteurRoulant::findOrFail($id);
        return view('EditDetenteurRoulant', compact('detenteur'));
    }

    public function update(Request $request, $id)
    {
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

        $detenteur = DetenteurRoulant::findOrFail($id);
        $detenteur->update($validated);

        return redirect()->route('roulants.detenteurs', ['id' => $detenteur->roulant_id])
                         ->with('success', 'Modification enregistrée avec succès.');
    }
}
