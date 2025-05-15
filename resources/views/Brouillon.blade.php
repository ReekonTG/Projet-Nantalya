@extends('layout')

@section('title', 'Liste des Matériels')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg" style="border-radius: 15px;">
        <div class="card-header text-white text-center" style="background-color: #4e73df; border-radius: 15px 15px 0 0;">
            <h2>Liste des Matériels Informatiques</h2>
        </div>
        <div class="card-body" style="background-color: #f8f9fc; border-radius: 0 0 15px 15px;">
            @if ($materiels->isEmpty())
                <div class="alert alert-info text-center">Aucun matériel enregistré pour le moment.</div>
            @else
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Numéro d'Inventaire</th>
                            <th>Désignation</th>
                            <th>Numéro de Série</th>
                            <th>Date d'Acquisition</th>
                            <th>Mode de Paiement</th>
                            <th>BC / BL</th>
                            <th>Bailleurs</th>
                            <th>Nature</th>
                            <th>Situations</th>
                            <th>Utilisateurs</th>
                            <th>Repère</th>
                            <th>Fournisseurs</th>
                            <th>Coût Unitaire</th>
                            <th>Coût Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($materiels as $materiel)
                        <tr>
                            <td>{{ $materiel->id }}</td>
                            <td>{{ $materiel->numero_inventaire }}</td>
                            <td>{{ $materiel->designation }}</td>
                            <td>{{ $materiel->numero_serie ?? 'N/A' }}</td>
                            <td>{{ $materiel->date_acquisition ?? 'N/A' }}</td>
                            <td>{{ $materiel->mode_paiement ?? 'N/A' }}</td>
                            <td>{{ $materiel->bc_bl ?? 'N/A' }}</td>
                            <td>{{ $materiel->bailleurs ?? 'N/A' }}</td>
                            <td>{{ $materiel->nature ?? 'N/A' }}</td>
                            <td>{{ $materiel->situations ?? 'N/A' }}</td>
                            <td>{{ $materiel->utilisateurs ?? 'N/A' }}</td>
                            <td>{{ $materiel->repere ?? 'N/A' }}</td>
                            <td>{{ $materiel->fournisseurs ?? 'N/A' }}</td>
                            <td>{{ number_format($materiel->cout_unitaire, 2, ',', ' ') }} Ar</td>
                            <td>{{ number_format($materiel->cout_total, 2, ',', ' ') }} Ar</td>
                            <td>
                                            <!-- Lien vers la page d'édition du matériel -->
                                            <a href="{{ route('materiels.edit', $materiel->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                
                                <!-- Lien pour supprimer le matériel (si vous l'implémentez) -->
                                <a href="#" class="btn btn-danger btn-sm">Supprimer</a>
                                 <!-- Nouveau bouton Voir -->
                                 <a href="{{ route('materiels.show', $materiel->id) }}" class="btn btn-info btn-sm">Voir</a>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
