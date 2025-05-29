@extends('layout')

@section('title', 'Liste des Matériels')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<div class="container py-5">
    <div class="card shadow-lg" style="border-radius: 15px;">
        <div class="card-header text-white text-center" style="background-color: #1d3557; border-radius: 15px 15px 0 0;">
            <h2 class="fw-bold">Liste des Matériels Informatiques</h2>
        </div>
        <div class="card-body" style="background-color: #f1faee; border-radius: 0 0 15px 15px;">
            
            <!-- Zone de Recherche -->
            <div class="input-group mb-4">
                <span class="input-group-text" style="background-color: #457b9d; color: white;">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" class="form-control" id="searchInput" placeholder="Rechercher un matériel...">
            </div>

            @if ($materiels->isEmpty())
                <div class="alert alert-info text-center fs-5">
                    Aucun matériel enregistré pour le moment.
                </div>
            @else
                <!-- Bouton Imprimer -->
                <div class="text-center mb-4">
                    <button class="btn btn-outline-success" onclick="imprimerTableau()">
                        <i class="bi bi-printer"></i> Imprimer
                    </button>
                </div>

                <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table table-bordered table-hover align-middle text-center" style="width: 100%; table-layout: fixed;">
                        <thead class="text-white" style="background-color: #457b9d;">
                            <tr>
                                <th>#</th>
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
                                <th class="signature-column">Signature</th> <!-- Nouvelle colonne pour la signature -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="materielTableBody">
                            @foreach($materiels as $materiel)
                            <tr class="bg-white border-bottom">
                                <td class="fw-bold">{{ $materiel->id }}</td>
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
                                <td class="signature-column">___</td> <!-- Colonne Signature vide -->
                                <td>
                                    <!-- Boutons en colonne avec icônes -->
                                    <div class="d-flex flex-column gap-2 align-items-center">
                                        <!-- Modifier -->
                                        <a href="{{ route('materiels.edit', $materiel->id) }}" 
                                           class="btn btn-outline-primary btn-lg rounded-circle" 
                                           title="Modifier" 
                                           style="width: 50px; height: 50px;">
                                            <i class="bi bi-pencil" style="font-size: 1.5rem;"></i>
                                        </a>

                                        <!-- Bouton Voir -->
                                        <a href="{{ route('informatique.show', $materiel->id) }}" 
                                           class="btn btn-outline-info btn-lg rounded-circle" 
                                           title="Voir" 
                                           style="width: 50px; height: 50px;">
                                            <i class="bi bi-eye" style="font-size: 1.5rem;"></i>
                                        </a>

                                        <!-- Supprimer -->
                                        <form action="{{ route('informatique.destroy', $materiel->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce matériel ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-lg rounded-circle" title="Supprimer" style="width: 50px; height: 50px;">
                                                <i class="bi bi-trash" style="font-size: 1.5rem;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            @endif
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Fonction de recherche dans le tableau
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = document.getElementById('searchInput').value.toLowerCase();
        let rows = document.querySelectorAll('#materielTableBody tr');

        rows.forEach(function(row) {
            let textContent = row.innerText.toLowerCase();
            row.style.display = textContent.includes(filter) ? '' : 'none';
        });
    });

    // Fonction d'impression
    function imprimerTableau() {
        // Crée un nouvel iframe pour l'impression
        var iframe = document.createElement('iframe');
        iframe.style.position = 'absolute';
        iframe.style.width = '0';
        iframe.style.height = '0';
        iframe.style.border = 'none';
        document.body.appendChild(iframe);

        var doc = iframe.contentWindow.document;
        
        // Copie du tableau dans l'iframe
        var tableContent = document.querySelector('.table').outerHTML;
        doc.open();
        doc.write('<html><head><title>Impression du Tableau</title>');
        doc.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">');
        doc.write('</head><body>');
        doc.write('<h2 class="text-center">Liste des Matériels Informatiques</h2>');
        doc.write(tableContent); // Tableau à imprimer
        doc.write('</body></html>');
        doc.close();

        // Lance l'impression
        iframe.contentWindow.focus();
        iframe.contentWindow.print();

        // Supprime l'iframe après l'impression
        document.body.removeChild(iframe);
    }
</script>

<!-- CSS pour gérer l'affichage de la colonne "Signature" uniquement lors de l'impression -->
<style>
    /* Masquer la colonne Signature par défaut */
    .signature-column {
        display: none;
    }

    /* Afficher la colonne Signature lors de l'impression */
    @media print {
        .signature-column {
            display: table-cell; /* Affiche la colonne lors de l'impression */
        }

        /* S'assurer que le tableau occupe toute la largeur lors de l'impression */
        table {
            width: 100% !important;
            table-layout: fixed;
        }

        /* Ajuste les marges pour une meilleure présentation */
        body {
            margin: 0;
            padding: 0;
        }

        /* Ajuste le titre pour qu'il ne soit pas trop grand */
        h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
    }
</style>

@endsection
