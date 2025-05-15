<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventaireInfo;
use App\Models\Informatique;

class InventaireInfoController extends Controller
{
    // Afficher la liste des inventaires pour un matériel spécifique (informatique)
    public function show($informatique_id)
    {
        // Récupérer l'objet informatique à partir de l'ID
        $informatique = Informatique::findOrFail($informatique_id);

        // Récupérer tous les inventaires associés à cet objet informatique
        $inventaires = InventaireInfo::where('informatique_id', $informatique_id)->get();

        // Retourner la vue avec l'objet informatique et la liste des inventaires
        return view('InventaireFicheInfo', compact('informatique', 'inventaires'));
    }

    // Afficher le formulaire d'ajout sans auto-remplissage des infos
    public function create($informatique_id)
    {
        // Récupérer l'objet informatique
        $informatique = Informatique::findOrFail($informatique_id);

        // Retourner la vue pour ajouter un inventaire, avec l'informatique
        return view('AjouterInventaire', compact('informatique'));
    }

    // Enregistrer un nouvel inventaire
    public function store(Request $request, $informatique_id)
    {
        // Validation des données envoyées par l'utilisateur
        $request->validate([
            'date' => 'required|date',
            'nom' => 'required|string',
            'organisations' => 'required|string',
            'contact' => 'required|string',
            'nombre' => 'required|integer',
            'situation' => 'nullable|string',
            'constatation' => 'nullable|string',
            'date_retour' => 'nullable|date',
            'observation' => 'nullable|string',
        ]);

        // Créer un nouvel inventaire avec les données validées
        $inventaire = new InventaireInfo();
        $inventaire->informatique_id = $informatique_id;
        $inventaire->date = $request->date;
        $inventaire->nom = $request->nom;
        $inventaire->organisations = $request->organisations;
        $inventaire->contact = $request->contact;
        $inventaire->nombre = $request->nombre;
        $inventaire->situation = $request->situation;
        $inventaire->constatation = $request->constatation;
        $inventaire->date_retour = $request->date_retour;
        $inventaire->observation = $request->observation;
        $inventaire->save();

        // Redirection vers la page des inventaires de l'informatique avec un message de succès
        return redirect()->route('inventaire.show', $informatique_id)
            ->with('success', 'Inventaire enregistré avec succès.');
    }

    // Modifier un inventaire
    public function edit($id)
    {
        // Récupérer l'inventaire à modifier
        $inventaire = InventaireInfo::findOrFail($id);

        // Retourner la vue pour modifier l'inventaire
        return view('ModifierInventaireInfo', compact('inventaire'));
    }

    // Mettre à jour un inventaire
    public function update(Request $request, $id)
    {
        // Validation des données pour la mise à jour
        $request->validate([
            'date' => 'required|date',
            'date_retour' => 'nullable|date',
            'observation' => 'nullable|string',
        ]);

        // Récupérer l'inventaire à mettre à jour
        $inventaire = InventaireInfo::findOrFail($id);
        $inventaire->date = $request->date;
        $inventaire->date_retour = $request->date_retour;
        $inventaire->observation = $request->observation;
        $inventaire->save();

        // Redirection avec message de succès
        return redirect()->route('inventaire.show', $inventaire->informatique_id)
            ->with('success', 'Inventaire mis à jour avec succès!');
    }

    // Supprimer un inventaire
    public function destroy($id)
    {
        // Récupérer et supprimer l'inventaire
        $inventaire = InventaireInfo::findOrFail($id);
        $informatique_id = $inventaire->informatique_id; // Garder l'ID de l'informatique pour la redirection
        $inventaire->delete();

        // Redirection vers la page des inventaires de l'informatique
        return redirect()->route('inventaire.show', $informatique_id)
            ->with('success', 'Inventaire supprimé avec succès.');
    }

   

}
