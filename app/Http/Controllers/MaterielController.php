<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materiel;
use App\Models\Personnel; // Importer le modèle Materiel
use App\Models\HistoriqueMateriel;
use App\Models\Suivimateriel; // Assurez-vous d'importer le modèle correspondant

class MaterielController extends Controller
{
    public function index()
{
    $personnels = Personnel::all(); 
    return view('Materiels', compact('personnels'));
}

    public function liste()
    {
        $materiels = Materiel::all(); // Récupère tous les enregistrements
        return view('Liste', compact('materiels')); // Passe les données à la vue
     }
    

    public function store(Request $request)
    {
        
        // Valider les données reçues
        $validated = $request->validate([
            'numero_inventaire' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'numero_serie' => 'nullable|string|max:255',
            'motifs' => 'nullable|string|max:255',
            'date_acquisition' => 'nullable|date',
            'mode_paiement' => 'nullable|string|max:255',
            'bc_bl' => 'nullable|string|max:255',
            'bailleurs' => 'nullable|string|max:255',
            'nature' => 'nullable|string|max:255',
            'situations' => 'nullable|string|max:255',
            'utilisateurs' => 'nullable|string|max:255',
            'repere' => 'nullable|string|max:255',
            'cout_unitaire' => 'nullable|numeric',
            'cout_total' => 'nullable|numeric',
            'fournisseurs' => 'nullable|string|max:255',
        ]);

        // Enregistrer les données dans la base de données
        Materiel::create($validated);

        // Rediriger avec un message de succès
        return redirect()->route('materiels')->with('success', 'Matériel enregistré avec succès!');
    }
    public function indexe()
{
    $materiels = Materiel::all(); // Récupère tous les matériels
    return view('Liste', compact('materiels')); // Passe les matériels à la vue
}

public function edit($id)
{
    $materiel = Materiel::findOrFail($id); // Récupère le matériel avec l'ID donné
    return view('Edit', compact('materiel'));
}


public function update(Request $request, $id)
{
    $materiel = Materiel::findOrFail($id);

    // Validation des données
    $request->validate([
        'numero_inventaire' => 'required|string|max:255',
        'designation' => 'required|string|max:255',
        'numero_serie' => 'required|string|max:255',
        'motifs' => 'nullable|string|max:255',
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

    // Mise à jour des données
    $materiel->update($request->all());

    return redirect()-> route('Liste')->with('success', 'Matériel mis à jour avec succès !');
}


public function view()
{
    $materiels = Materiel::all(); // Récupère tous les matériels
    return view('MaterielsView', compact('materiels')); // Passe les matériels à la vue spécifique
}


public function show($id)
{
    // Récupérer les informations du matériel depuis la base de données
    $materiel = Materiel::findOrFail($id);
    $personnels = \App\Models\Personnel::all(); 
    return view('Voir', compact('materiel','personnels'));
}

// Ajouter des informations supplémentaires
public function ajouterInformations(Request $request, $id)
{
    // Vérifier si le dernier détenteur a bien rempli la date de retour et l'observation
    $dernierDetenteur = HistoriqueMateriel::where('materiel_id', $id)->latest()->first();

    if ($dernierDetenteur) {
        if (empty($dernierDetenteur->date_retour) || empty($dernierDetenteur->observation)) {
            return redirect()->back()->with('error', 'Le matériel n\'est pas encore disponible.');
        }
    }
    // Validation des données
    $validatedData = $request->validate([
        'date' => 'required|date',
        'nom' => 'required|string|max:255',
        'organisme' => 'required|string|max:255',
        'contact' => 'required|string|max:255',
        'nombre' => 'required|integer|min:1',
        'situation' => 'required|string|max:255',
        'date_retour' => 'nullable|date',
        'observation' => 'nullable|string|max:1000',
    ]);

    // Enregistrement dans la table historique_materiel
    HistoriqueMateriel::create([
        'materiel_id' => $id,
        'date' => $validatedData['date'],
        'nom' => $validatedData['nom'],
        'organisme' => $validatedData['organisme'],
        'contact' => $validatedData['contact'],
        'nombre' => $validatedData['nombre'],
        'situation' => $validatedData['situation'],
        'date_retour' => $validatedData['date_retour'],
        'observation' => $validatedData['observation'],
    ]);

    // Rediriger avec un message de succès
    return redirect()->route('materiels.show', $id)->with('success', 'Informations ajoutées avec succès !');
}

public function fin($id)
{
    $materiel = Materiel::findOrFail($id);  // Trouve le matériel selon l'ID
    $historique = HistoriqueMateriel::where('materiel_id', $id)->get(); // Récupère l'historique lié à ce matériel

    return view('fin', compact('materiel', 'historique'));
}


public function storeSuivi(Request $request, $materielId)
{
    // Validation des données de suivi
    $validated = $request->validate([
        'date_suivi' => 'required|date',
        'nom' => 'required|string|max:255',
        'organisme' => 'required|string|max:255',
        'contact' => 'required|string|max:255',
        'nombre' => 'required|integer|min:1',
        'situation' => 'required|string|max:255',
        'constation' => 'required|string|max:255',
        'date_retour' => 'nullable|date',
        'observation' => 'required|string|max:1000',
    ]);

    // Enregistrement dans la table suivimateriels
    Suivimateriel::create([
        'date_suivi' => $validated['date_suivi'],
        'nom' => $validated['nom'],
        'organisme' => $validated['organisme'],
        'contact' => $validated['contact'],
        'nombre' => $validated['nombre'],
        'situation' => $validated['situation'],
        'constation' => $validated['constation'],
        'date_retour' => $validated['date_retour'],
        'observation' => $validated['observation'],
        'materiel_id' => $materielId,  // Associe le suivi au matériel
    ]);

    // Rediriger vers la page du matériel avec un message de succès
    return back()->with('success', 'Suivi ajouté avec succès !');
}
public function suivi($materielId)
{
    // Récupérer le matériel avec l'ID donné
    $materiel = Materiel::findOrFail($materielId);

    // Récupérer les suivis associés à ce matériel
    $suivis = SuiviMateriel::where('materiel_id', $materielId)->get();

    // Retourner la vue avec les données
    return view('SuiviMateriel', compact('materiel', 'suivis'));
}
public function editSuivi($id)
{
    // Récupère le suivi à modifier
    $suivi = SuiviMateriel::findOrFail($id);

    // Retourne la vue avec les données du suivi
    return view('EditSuiviMateriel', compact('suivi'));
}
public function updateSuivi(Request $request, $id)
{
    // Valide les données du formulaire
    $validated = $request->validate([
        'date_suivi' => 'required|date',
        'nom' => 'required|string|max:255',
        'organisme' => 'required|string|max:255',
        'contact' => 'required|string|max:255',
        'nombre' => 'required|integer',
        'situation' => 'required|string|max:255',
        'constation' => 'nullable|string',
        'date_retour' => 'nullable|date',
        'observation' => 'nullable|string',
    ]);

    // Récupère le suivi à mettre à jour
    $suivi = SuiviMateriel::findOrFail($id);

    // Met à jour le suivi avec les données validées
    $suivi->update($validated);

    // Redirige vers la page de suivi avec un message de succès
    return redirect()->route('suivimateriels.index')->with('success', 'Suivi mis à jour avec succès');
}

public function edite($id)
{
    $detenteur = HistoriqueMateriel::findOrFail($id);
    return view('EditFin', compact('detenteur'));
}

public function updateFin(Request $request, $id)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'organisme' => 'required|string|max:255',
        'contact' => 'required|string|max:255',
        'nombre' => 'required|integer',
        'situation' => 'required|string|max:255',
        'date_retour' => 'nullable|date',
        'observation' => 'nullable|string',
    ]);

    $detenteur = HistoriqueMateriel::findOrFail($id);
    $detenteur->update($request->all());

    return redirect()->route('materiels.fin', $detenteur->materiel_id)->with('success', 'Détenteur mis à jour avec succès !');

}
public function listePersonnels()
{
    $personnels = Personnel::all(); // Récupérer tous les personnels
    return view('Materiels', compact('personnels')); // Passer la variable à la vue
}
}