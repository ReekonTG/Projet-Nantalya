<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materiel; 

class DetailController extends Controller
{
    //


    public function showDetail($id)
    {
        $materiel = Materiel::find($id);  // Récupérer le matériel en fonction de son ID
        $materiels = Materiel::all();  // Récupérer tous les matériels enregistrés
    
        return view('materiel.detail', compact('materiel', 'materiels'));
    }
    
    public function store(Request $request)
    {
        $materiel = new Materiel();
        $materiel->numero_inventaire = $request->numero_inventaire;
        $materiel->designation = $request->designation;
        $materiel->numero_serie = $request->numero_serie;
        $materiel->motifs = $request->motifs;
        $materiel->date_acquisition = $request->date_acquisition;
        $materiel->cout_unitaire = $request->cout_unitaire;
        $materiel->cout_total = $request->cout_total;
        $materiel->save();
    
        return redirect()->route('materiel.detail', ['id' => $materiel->id]);
    }
    
}