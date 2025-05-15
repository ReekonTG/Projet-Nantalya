<?php

namespace App\Exports;

use App\Models\Inventaire;  // Assure-toi que ton modèle Inventaire est correctement importé
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventaireExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Récupérer tous les inventaires avec leurs relations (ajoute d'autres relations si nécessaire)
        return Inventaire::with('situations') // Assure-toi d'inclure les relations nécessaires
            ->get()
            ->map(function($inventaire) {
                return [
                    $inventaire->id,
                    $inventaire->type,
                    $inventaire->numero_inventaire ?? 'N/A',
                    $inventaire->designation ?? 'N/A',
                    $inventaire->numero_serie ?? 'N/A',
                    $inventaire->date_acquisition ?? 'N/A',
                    $inventaire->mode_paiement ?? 'N/A',
                    $inventaire->bc_bl ?? 'N/A',
                    $inventaire->bailleurs ?? 'N/A',
                    $inventaire->nature ?? 'N/A',
                    optional($inventaire->situations->last())->localite ?? 'N/A',
                    // Ajoute ici les situations des années
                    ...$this->getSituationsForExport($inventaire),
                    $inventaire->utilisateurs ?? 'N/A',
                    $inventaire->repere ?? 'N/A',
                    $inventaire->cout_unitaire ?? 'N/A',
                    $inventaire->cout_total ?? 'N/A',
                    $inventaire->fournisseurs ?? 'N/A',
                ];
            });
    }

    public function headings(): array
    {
        // Ici tu définis les titres des colonnes
        return [
            'ID', 'Type', 'Numéro d\'Inventaire', 'Désignation', 'Numéro de Série', 'Date d\'Acquisition',
            'Mode de Paiement', 'BC/BL', 'Bailleurs', 'Nature', 'Localité', 
            'Situation 1', 'Situation 2', 'Situation 3', // Change avec le nombre d'années de situations
            'Utilisateurs', 'Repère', 'Coût Unitaire', 'Coût Total', 'Fournisseurs'
        ];
    }

    private function getSituationsForExport($inventaire)
    {
        // Exemple pour ajouter les situations des années (ajuste selon ton besoin)
        return $inventaire->situations->map(function($situation) {
            return $situation->situation ?? 'N/A';
        })->toArray();
    }
}
