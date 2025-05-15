*@extends('layout')

@section('title', 'Fiche du Roulant')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container">
    <h2>Détails du Roulant</h2>
    <table class="table table-bordered">
        <thead>
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
                <td>{{ $roulant->numero_inventaire }}</td>
                <td>{{ $roulant->designation }}</td>
                <td>{{ $roulant->numero_serie }}</td>
                <td>{{ $roulant->date_acquisition }}</td>
                <td>{{ $roulant->mode_paiement }}</td>
                <td>{{ $roulant->bc_bl }}</td>
                <td>{{ $roulant->bailleurs }}</td>
                <td>{{ $roulant->nature }}</td>
                <td>{{ $roulant->situations }}</td>
                <td>{{ $roulant->utilisateurs }}</td>
                <td>{{ $roulant->repere }}</td>
                <td>{{ $roulant->fournisseurs }}</td>
                <td>{{ $roulant->cout_unitaire }}</td>
                <td>{{ $roulant->cout_total }}</td>
            </tr>
        </tbody>
    </table>

    <h3 class="mt-4">📄 Liste des détenteurs</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Nom</th>
                <th>Organisations</th>
                <th>Contact</th>
                <th>Nombre</th>
                <th>Situation</th>
                <th>Date de Retour</th>
                <th>Observation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detenteurs as $detenteur)
            <tr>
                <td>{{ $detenteur->date }}</td>
                <td>{{ $detenteur->nom }}</td>
                <td>{{ $detenteur->organisations }}</td>
                <td>{{ $detenteur->contact }}</td>
                <td>{{ $detenteur->nombre }}</td>
                <td>{{ $detenteur->situation }}</td>
                <td>{{ $detenteur->date_retour ?? 'Non retourné' }}</td>
                <td>{{ $detenteur->observation }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('roulants.list') }}" class="btn btn-primary">Retour à la liste</a>

    <a href="{{ route('inventaire.roulant') }}" class="btn btn-warning">📋 Inventaire</a>


</div>
@endsection
