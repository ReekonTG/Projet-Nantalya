<?php



namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InventaireExport; 
use Illuminate\Http\Request;
use App\Models\Informatique;
use App\Models\Roulant;
use App\Models\Materiel;

class InventaireController extends Controller
{
    public function index()
    {
        // Récupérer toutes les données des trois tables
        $informatique = Informatique::all();
        $roulants = Roulant::all();
        $materiels = Materiel::all();

        // Ajouter un champ "type" pour identifier l'origine de chaque matériel
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

        // Retourner la vue avec les données
        return view('Inventaire', compact('inventaire'));
    }

   

   
    
    public function exportInventaire()
    {
        return Excel::download(new InventaireExport, 'inventaire.xlsx');
    }
    

}