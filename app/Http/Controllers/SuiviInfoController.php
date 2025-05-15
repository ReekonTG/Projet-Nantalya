<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuiviInfo;
use App\Models\Informatique;
class SuiviInfoController extends Controller
{
    // Enregistrer un nouvel élément dans la base de données
    public function store(Request $request)
    {
        $validated = $request->validate([
            'informatique_id' => 'required|integer',
            'date' => 'required|date',
            'nom' => 'required|string|max:255',
            'organisations' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'nombre' => 'required|integer',
            'situation' => 'required|string|max:255',
            'constatation' => 'nullable|string',
            'date_retour' => 'nullable|date',
            'observation' => 'nullable|string',
        ]);

        SuiviInfo::create($validated);

        return back()->with('success', 'Données enregistrées avec succès !');
    }
    public function show($id)
{
    $materiel = Informatique::findOrFail($id);
    $suivis = SuiviInfo::where('informatique_id', $id)->get();

    return view('SuiviInfo', compact('materiel', 'suivis'));
}

}
