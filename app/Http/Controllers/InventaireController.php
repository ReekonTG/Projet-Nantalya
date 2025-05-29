<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InventaireExport; 
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Informatique;
use App\Models\Roulant;
use App\Models\Materiel;

class InventaireController extends Controller
{
    public function index(Request $request)
    {
        $typeFilter = $request->query('type');
        $searchTerm = $request->query('search');
    
        $informatique = Informatique::all()->each->setAttribute('type', 'Informatique');
        $roulants = Roulant::all()->each->setAttribute('type', 'Roulant');
        $materiels = Materiel::all()->each->setAttribute('type', 'Materiel');
    
        $collection = $informatique->concat($roulants)->concat($materiels);
    
        // Appliquer le filtre par type
        if ($typeFilter) {
            $collection = $collection->filter(fn($item) => $item->type === $typeFilter);
        }
    
        // Recherche par numéro d'inventaire
        if ($searchTerm) {
            $searchTerm = strtolower($searchTerm);
            $collection = $collection->filter(function ($item) use ($searchTerm) {
                return str_contains(strtolower($item->numero_inventaire ?? ''), $searchTerm);
            });
        }
    
        $sorted = $collection->sortByDesc('id');
    
        // Pagination
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $sorted->slice(($currentPage - 1) * $perPage, $perPage)->values();
    
        $inventaire = new LengthAwarePaginator(
            $currentItems,
            $sorted->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    
        return view('Inventaire', compact('inventaire', 'typeFilter', 'searchTerm'));
    }
    

    
    
    public function exportInventaire()
    {
        return Excel::download(new InventaireExport, 'inventaire.xlsx');
    }
    

}