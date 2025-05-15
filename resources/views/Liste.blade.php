@extends('layout')

@section('title', 'Liste des Matériels')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container py-5">
    <h2 class="mb-4 text-center text-primary font-weight-bold">📋 Liste des Matériels</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Zone de recherche -->
    <div class="input-group mb-4 shadow-sm">
        <span class="input-group-text bg-primary text-white">
            <i class="fas fa-search"></i>
        </span>
        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un matériel..." />
    </div>

    <!-- Tableau des matériels -->
    <div class="table-responsive shadow-lg rounded">
        <table class="table table-striped table-hover table-bordered align-middle" id="materielsTable">
            <thead class="table-dark">
                <tr>
                    <th>Numéro d'Inventaire</th>
                    <th>Désignation</th>
                    <th>Numéro de Série</th>
                    <th>Motifs</th>
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
                    <th>Actions</th> <!-- Dernière colonne pour les boutons -->
                </tr>
            </thead>
            <tbody>
                @foreach($materiels as $materiel)
                    <tr>
                        <td>{{ $materiel->numero_inventaire }}</td>
                        <td>{{ $materiel->designation }}</td>
                        <td>{{ $materiel->numero_serie }}</td>
                        <td>{{ $materiel->date_acquisition }}</td>
                        <td>{{ $materiel->mode_paiement }}</td>
                        <td>{{ $materiel->bc_bl }}</td>
                        <td>{{ $materiel->bailleurs }}</td>
                        <td>{{ $materiel->nature }}</td>
                        <td>{{ $materiel->situations }}</td>
                        <td>{{ $materiel->utilisateurs }}</td>
                        <td>{{ $materiel->repere }}</td>
                        <td>{{ $materiel->fournisseurs }}</td>
                        <td>{{ $materiel->cout_unitaire }} Ar</td>
                        <td>{{ $materiel->cout_total }} Ar</td>
                        <td class="action-column">
                            <!-- Lien vers la page de modification -->
                            <a href="{{ route('materiels.edit', $materiel->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-pencil-alt"></i> Modifier
                            </a>
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash-alt"></i> Supprimer
                            </button>
                            <!-- Nouveau bouton Voir -->
                            <a href="{{ route('materiels.show', $materiel->id) }}" class="btn btn-sm btn-outline-info mt-1">
                                <i class="fas fa-eye"></i> Voir
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bouton Voir uniquement le tableau -->
    <div class="text-center mt-4">
        <a href="{{ route('materiels.view') }}" class="btn btn-primary btn-lg">
            Voir uniquement le tableau
        </a>
    </div>
</div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        table th, table td {
            text-align: center;
        }

        /* Nouvelle règle CSS pour garantir que les boutons sont bien dans la colonne des actions */
        .action-column {
            text-align: center;
        }

        .action-column a, .action-column button {
            margin: 5px; /* Espacement entre les boutons */
        }

        /* Assurer un alignement des boutons dans la colonne "Actions" */
        .btn-sm {
            padding: 5px 10px;
        }
    </style>
@endsection

@section('scripts')
<script>
    // Fonction de recherche dans le tableau
    function searchTable() {
        let input = document.getElementById('searchInput').value.toLowerCase();
        let rows = document.querySelectorAll('#materielsTable tbody tr');
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(input) ? '' : 'none';
        });
    }

    document.getElementById('searchInput').addEventListener('keyup', searchTable);
</script>
@endsection
