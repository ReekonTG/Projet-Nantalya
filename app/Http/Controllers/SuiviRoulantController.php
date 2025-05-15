<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuiviRoulant;
use App\Models\Roulant;

class SuiviRoulantController extends Controller
{
    public function store(Request $request, $roulant_id)
    {
        $request->validate([
            'date_suivi' => 'required|date',
            'nom' => 'required|string',
            'organisme' => 'required|string',
            'contact' => 'required|string',
            'nombre' => 'required|integer',
            'situation' => 'required|string',
            'constation' => 'required|string',
            'date_retour' => 'nullable|date',
            'observation' => 'required|string',
        ]);

        SuiviRoulant::create([
            'roulant_id' => $roulant_id,
            'date_suivi' => $request->date_suivi,
            'nom' => $request->nom,
            'organisme' => $request->organisme,
            'contact' => $request->contact,
            'nombre' => $request->nombre,
            'situation' => $request->situation,
            'constation' => $request->constation,
            'date_retour' => $request->date_retour,
            'observation' => $request->observation,
        ]);

        return redirect()->back()->with('success', 'Suivi ajouté avec succès.');
    }

    public function show($id)
{
    $roulant = Roulant::findOrFail($id); // Récupère les informations du roulant
    $suivis = SuiviRoulant::where('roulant_id', $id)->get(); // Récupère les suivis associés au roulant

    return view('SuiviRoulant', compact('roulant', 'suivis'));
}

}

