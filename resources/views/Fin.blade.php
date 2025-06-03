@extends('layout')

@section('title', 'Fin du Suivi du Matériel')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container py-5">
    <h2 class="mb-4 text-center text-primary font-weight-bold">📋 Détail du Matériel</h2>

    <!-- Tableau des détails du matériel -->
    <div class="table-responsive shadow-lg">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
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
                </tr>
            </thead>
            <tbody>
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
                </tr>
            </tbody>
        </table>
    </div>

    <h3 class="mt-5 text-center text-secondary">📋 Liste des Détenteurs</h3>

    <!-- Tableau des informations enregistrées -->
    <div class="table-responsive shadow-lg">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Date</th>
                    <th>Nom</th>
                    <th>Organisations</th>
                    <th>Contact</th>
                    <th>Nombre</th>
                    <th>Situation</th>
                    <th>Date de Retour</th>
                    <th>Observation</th>
                    <th>Actions</th> <!-- Nouvelle colonne pour les actions -->
                </tr>
            </thead>
            <tbody>
                @foreach($historique as $item)
                <tr>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->nom }}</td>
                    <td>{{ $item->organisme }}</td>
                    <td>{{ $item->contact }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->situation }}</td>
                    <td>{{ $item->date_retour }}</td>
                    <td>{{ $item->observation }}</td>
                    <td>
                        <a href="{{ route('detenteurs.editFin', $item->id) }}" class="btn btn-sm btn-primary">
                            Modifier
                        </a>
                    </td> <!-- Le bouton Modifier est dans la dernière colonne -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bouton retour -->
    <div class="text-center mt-4">
        <a href="{{ route('materiels.index') }}" class="btn btn-primary btn-lg">Retour à la liste</a>
    </div>
</div>

@endsection

