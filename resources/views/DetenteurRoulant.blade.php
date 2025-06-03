@extends('layout')

@section('title', 'Détenteurs du Roulant')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container">
    <h2 class="text-center mb-4">Détails du Roulant</h2>
    
    <!-- Tableau du roulant -->
     <!-- Tableau des détails du matériel -->
     <div class="table-responsive shadow-lg mb-5">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Numéro d'Inventaire</th>
                    <th>Désignation</th>
                    <th>Numéro de Série</th>
                    <th>Date d'Acquisition</th>
                    <th>Mode de Paiement</th>
                    <th>Coût Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $materiel->numero_inventaire }}</td>
                    <td>{{ $materiel->designation }}</td>
                    <td>{{ $materiel->numero_serie ?? 'N/A' }}</td>
                    <td>{{ $materiel->date_acquisition ?? 'N/A' }}</td>
                    <td>{{ $materiel->mode_paiement ?? 'N/A' }}</td>
                    <td>{{ number_format($materiel->cout_total, 2, ',', ' ') }} Ar</td>
                </tr>
            </tbody>
        </table>
    </div>


    <h2 class="text-center mt-5 mb-4">Liste des Détenteurs</h2>

    <!-- Tableau des détenteurs -->
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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detenteurs as $detenteur)
                <tr>
                    <td>{{ $detenteur->date }}</td>
                    <td>{{ $detenteur->nom }}</td>
                    <td>{{ $detenteur->organisations }}</td>
                    <td>{{ $detenteur->contact }}</td>
                    <td>{{ $detenteur->nombre }}</td>
                    <td>{{ $detenteur->situation }}</td>
                    <td>{{ $detenteur->date_retour }}</td>
                    <td>{{ $detenteur->observation }}</td>
                    <td>
                        <a href="{{ route('EditDetenteurRoulant.edit', $detenteur->id) }}" class="btn btn-sm btn-primary">
                            Modifier
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
