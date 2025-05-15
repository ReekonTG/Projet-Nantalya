<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SituationAnnuelle;
use App\Models\Informatique;
use App\Models\Roulant;
use App\Models\Materiel;

class SituationAnnuelleController extends Controller {
    
    public function show($id, $type) {
        switch ($type) {
            case 'Informatique':
                $materiel = Informatique::find($id);
                break;
            case 'Roulant':
                $materiel = Roulant::find($id);
                break;
            case 'Materiel':
                $materiel = Materiel::find($id);
                break;
            default:
                return redirect()->back()->with('error', 'Type de matériel invalide.');
        }
        
        if (!$materiel) {
            return redirect()->back()->with('error', 'Matériel introuvable.');
        }   
        
        
          // Passe le type de matériel et l'objet à la vue
    return view('situation_annuelle', [
        'materiel' => $materiel,
        'materiel_type' => $type  // Passe 'materiel_type' à la vue
    ]);

    }

    public function store(Request $request) {
       
        $request->validate([
            'materiel_id' => 'required',
            'materiel_type' => 'required|in:Informatique,Roulant,Materiel',
            'annee' => 'required',
            'localite' => 'required',
            'situation' => 'required'
        ]);

        SituationAnnuelle::create([
            'materiel_id' => $request->materiel_id,
            'materiel_type' => $request->materiel_type,
            'annee' => $request->annee,
            'localite' => $request->localite,
            'situation' => $request->situation
        ]);

        return redirect()->back()->with('success', 'Situation annuelle enregistrée avec succès.');
    }

    public function toutInventaire()
    {
        // Récupérer toutes les données des trois tables
        $informatique = Informatique::all();
        $roulants = Roulant::all();
        $materiels = Materiel::all();
    
        // Ajouter un champ "type" pour identifier l'origine
        $informatique->each(function ($item) {
            $item->type = 'Informatique';
        });
    
        $roulants->each(function ($item) {
            $item->type = 'Roulant';
        });
    
        $materiels->each(function ($item) {
            $item->type = 'Materiel';
        });
    
        // Fusionner les collections en une seule
        $inventaire = $informatique->concat($roulants)->concat($materiels);
    
        // Récupérer toutes les années distinctes pour les situations annuelles
        $annees = \App\Models\SituationAnnuelle::distinct()->pluck('annee')->sortDesc();
    
        // Associer chaque matériel avec ses situations annuelles par année
        foreach ($inventaire as $item) {
            $situations = \App\Models\SituationAnnuelle::where('materiel_id', $item->id)
                ->where('materiel_type', $item->type)
                ->get()
                ->keyBy('annee'); // Clé basée sur l'année
    
            $item->situations = $situations; // Stocker toutes les situations indexées par année
        }
    
        // Retourner la vue avec les données et les années
        return view('ToutInventaire', compact('inventaire', 'annees'));
    }
    
    
}
