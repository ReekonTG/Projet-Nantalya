@extends('layout')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container mt-5">
    <!-- Tableau du matériel choisi -->
    <div class="mt-5 shadow-lg p-4 bg-light rounded">
        <h3 class="text-center text-secondary mb-4">📋 Détails du Matériel</h3>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom du Matériel</th>
                    <th>Type</th>
                    <th>Quantité</th>
                    <th>Localité</th>
                    <th>Situation</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $materiel->nom }}</td>
                    <td>{{ $materiel->type }}</td>
                    <td>{{ $materiel->quantite }}</td>
                    <td>{{ $materiel->localite }}</td>
                    <td>{{ $materiel->situation }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Tableau des suivis associés au matériel -->
    <div class="mt-5 shadow-lg p-4 bg-light rounded">
        <h3 class="text-center text-secondary mb-4">📋 Suivis du Matériel</h3>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Nom</th>
                    <th>Organisme / Poste</th>
                    <th>Contact</th>
                    <th>Nombre</th>
                    <th>Situation</th>
                    <th>Constatation</th>
                    <th>Date de Retour</th>
                    <th>Observation</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suivis as $suivi)
                    <tr>
                        <td>{{ $suivi->date }}</td>
                        <td>{{ $suivi->nom }}</td>
                        <td>{{ $suivi->organisations }}</td>
                        <td>{{ $suivi->contact }}</td>
                        <td>{{ $suivi->nombre }}</td>
                        <td>{{ $suivi->situation }}</td>
                        <td>{{ $suivi->constatation }}</td>
                        <td>{{ $suivi->date_retour }}</td>
                        <td>{{ $suivi->observation }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
