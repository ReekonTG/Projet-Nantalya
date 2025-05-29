<?php

namespace App\Http\Controllers;
use App\Models\DetenteurInfo;
use App\Models\Informatique;
use Illuminate\Http\Request;
use App\Models\Personnel;
class InformatiqueController extends Controller
{
    // Afficher la liste des matériels
    public function index()
    {
        // Récupérer tous les matériels
        $materiels = Informatique::all();
        

        // Retourner la vue avec les données
        return view('ListeInfo', compact('materiels'));
    }  

    // Sauvegarder un nouveau matériel
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'numero_inventaire' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'numero_serie' => 'nullable|string|max:255',
            'date_acquisition' => 'nullable|date',
            'mode_paiement' => 'nullable|string|max:255',
            'bc_bl' => 'nullable|string|max:255',
            'bailleurs' => 'nullable|string|max:255',
            'nature' => 'nullable|string|max:255',
            'situations' => 'nullable|string|max:255',
            'utilisateurs' => 'nullable|string|max:255',
            'repere' => 'nullable|string|max:255',
            'fournisseurs' => 'nullable|string|max:255',
            'cout_unitaire' => 'nullable|numeric',
            'cout_total' => 'nullable|numeric',
        ]);

        // Créer un nouveau matériel
        Informatique::create($request->all());

        // Rediriger avec un message de succès
        return redirect()->route('listeInfo')->with('success', 'Le matériel a été ajouté avec succès!');
    }

    // Modifier un matériel existant
    public function edit($id)
    {
        // Trouver le matériel par son ID
        $materiel = Informatique::findOrFail($id);

        // Retourner la vue avec les données du matériel
        return view('Edite', compact('materiel'));
    }

    // Mettre à jour les informations d'un matériel
    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $request->validate([
            'numero_inventaire' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'numero_serie' => 'nullable|string|max:255',
            'date_acquisition' => 'nullable|date',
            'mode_paiement' => 'nullable|string|max:255',
            'bc_bl' => 'nullable|string|max:255',
            'bailleurs' => 'nullable|string|max:255',
            'nature' => 'required|numeric',
            'situations' => 'nullable|string|max:255',
            'utilisateurs' => 'nullable|string|max:255',
            'repere' => 'nullable|string|max:255',
            'fournisseurs' => 'nullable|string|max:255',
            'cout_unitaire' => 'nullable|numeric',
            'cout_total' => 'nullable|numeric',
        ]);

        // Trouver le matériel et mettre à jour
        $materiel = Informatique::findOrFail($id);
        $materiel->update($request->all());

        // Rediriger avec un message de succès
        return redirect()->route('listeInfo')->with('success', 'Le matériel a été mis à jour avec succès!');
    }

    // Supprimer un matériel
    public function destroy($id)
    {
        // Trouver l'élément à supprimer dans la table 'informatique'
        $informatique = Informatique::findOrFail($id);

        // Supprimer l'élément
        $informatique->delete();

        // Retourner à la liste avec un message de succès
        return redirect()->route('listeInfo')->with('success', 'Le matériel a été supprimé avec succès.');
    }

    // Afficher un matériel spécifique
    // Dans ton contrôleur (InformatiqueController par exemple)
    public function show($id)
    {
        $materiel = Informatique::findOrFail($id); // Chargement du matériel
        $detenteurs = DetenteurInfo::where('info_id', $id)->get(); // Les détenteurs de ce matériel
        $personnels = \App\Models\Personnel::all(); // Récupération de tous les personnels

        return view('voirinfo', compact('materiel', 'detenteurs', 'personnels'));
    }

    // Méthode pour afficher la fiche d'un matériel
    public function fiche($id)
    {
        $materiel = Informatique::findOrFail($id); // Chargement du matériel
        $detenteurs = DetenteurInfo::where('info_id', $id)->get(); // Les détenteurs de ce matériel
        $personnels = Personnel::all(); // Récupération de tous les personnels

        return view('voirinfo', compact('materiel', 'detenteurs', 'personnels'));
    }



public function listePersonnels()
{
    $personnels = Personnel::all(); // Récupérer tous les personnels
    return view('Informatique', compact('personnels')); // Passer la variable à la vue
}



}
