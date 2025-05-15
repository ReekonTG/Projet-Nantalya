@extends('layout')

@section('title', 'Fiche Inventaire')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container py-5">

    <h2 class="mb-4 text-center text-primary font-weight-bold">📋 Fiche d'Inventaire</h2>

    <!-- Détails du matériel -->
    <div class="mb-5">
        <h4 class="text-info font-weight-bold">Détails du Matériel</h4>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Numéro d'Inventaire :</strong> {{ $informatique->numero_inventaire }}</p>
                <p><strong>Désignation :</strong> {{ $informatique->designation }}</p>
                <p><strong>Numéro de Série :</strong> {{ $informatique->numero_serie ?? 'N/A' }}</p>
                <p><strong>Date d'Acquisition :</strong> {{ $informatique->date_acquisition ?? 'N/A' }}</p>
                <p><strong>Mode de Paiement :</strong> {{ $informatique->mode_paiement ?? 'N/A' }}</p>
                <p><strong>BC / BL :</strong> {{ $informatique->bc_bl ?? 'N/A' }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Bailleurs :</strong> {{ $informatique->bailleurs ?? 'N/A' }}</p>
                <p><strong>Nature :</strong> {{ $informatique->nature ?? 'N/A' }}</p>
                <p><strong>Situations :</strong> {{ $informatique->situations ?? 'N/A' }}</p>
                <p><strong>Utilisateurs :</strong> {{ $informatique->utilisateurs ?? 'N/A' }}</p>
                <p><strong>Repère :</strong> {{ $informatique->repere ?? 'N/A' }}</p>
                <p><strong>Fournisseurs :</strong> {{ $informatique->fournisseurs ?? 'N/A' }}</p>
                <p><strong>Coût Unitaire :</strong> {{ number_format($informatique->cout_unitaire, 2, ',', ' ') }} Ar</p>
                <p><strong>Coût Total :</strong> {{ number_format($informatique->cout_total, 2, ',', ' ') }} Ar</p>
            </div>
        </div>
    </div>

    <!-- Tableau des inventaires liés au matériel -->
    <div class="table-responsive shadow-lg">
        <table class="table table-striped table-hover table-bordered" id="tableauInventaire">
            <thead class="table-dark">
                <tr>
                    <th>Date</th>
                    <th>Nom</th>
                    <th>Organisme / Poste</th>
                    <th>Contact</th>
                    <th>Nombre</th>
                    <th>Situation</th>
                    <th>Constatation</th>
                    <th class="empty-column d-none">Signature du Détenteur</th>
                    <th class="empty-column d-none">Signature Responsable Info</th>
                    <th>Date de Retour</th>
                    <th>Observation</th>
                    <th class="empty-column d-none">&nbsp;</th>
                    <th class="empty-column d-none">&nbsp;</th>
                    <th class="modifier-column">Actions</th> <!-- Visible dans la vue -->
                </tr>
            </thead>
            <tbody>
                @foreach ($inventaires as $inventaire)
                <tr>
                    <td>{{ $inventaire->date }}</td>
                    <td>{{ $inventaire->nom }}</td>
                    <td>{{ $inventaire->organisme_poste }}</td>
                    <td>{{ $inventaire->contact }}</td>
                    <td>{{ $inventaire->nombre }}</td>
                    <td>{{ $inventaire->situation }}</td>
                    <td>{{ $inventaire->constatation }}</td>
                    <td class="empty-column d-none"></td> <!-- Signature du Détenteur -->
                    <td class="empty-column d-none"></td> <!-- Signature Responsable Info -->
                    <td>{{ $inventaire->date_retour ?? 'N/A' }}</td>
                    <td>{{ $inventaire->observation ?? 'N/A' }}</td>
                    <td class="empty-column d-none">&nbsp;</td>
                    <td class="empty-column d-none">&nbsp;</td>
                    <td class="modifier-column">
                        <!-- Bouton Modifier -->
                        <a href="{{ route('inventaire.edit', $inventaire->id) }}" class="btn btn-warning btn-sm">
                            ✏️ Modifier
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bouton Imprimer -->
    <div class="text-center mt-4">
        <button onclick="imprimerTableau()" class="btn btn-success btn-lg">Imprimer le Tableau</button>
    </div>

    <!-- Bouton retour -->
    <div class="text-center mt-4">
        <a href="{{ route('ListeInfo') }}" class="btn btn-primary btn-lg">Retour à la liste</a>
    </div>
</div>

<script>
    function imprimerTableau() {
        var contenuTableau = document.querySelector('.table-responsive').outerHTML;
        var fenetreImpression = window.open('', '', 'height=500, width=800');
        fenetreImpression.document.write('<html><head><title>Impression Tableau</title>');
        fenetreImpression.document.write('<style>table {width: 100%; border-collapse: collapse;} td, th {border: 1px solid #ddd; padding: 8px; text-align: left;} th {background-color: #f2f2f2;}');
        
        // Masquer la colonne "Modifier" lors de l'impression
        fenetreImpression.document.write('.modifier-column { display: none; }');
        
        // Afficher les colonnes vides lors de l'impression
        fenetreImpression.document.write('.empty-column { display: table-cell !important; width: 10%; }');
        
        fenetreImpression.document.write('</style>');
        fenetreImpression.document.write('</head><body>');
        fenetreImpression.document.write(contenuTableau);
        fenetreImpression.document.write('</body></html>');
        fenetreImpression.document.close();
        fenetreImpression.print();
    }
</script>
@endsection
