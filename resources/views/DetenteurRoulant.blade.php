@extends('layout')

@section('title', 'Détenteurs du Roulant')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container">
    <h2 class="text-center mb-4">Détails du Roulant</h2>
    
    <!-- Tableau du roulant -->
    <table class="table table-bordered">
        <tr>
            <th>Numéro d'Inventaire</th>
            <td>{{ $roulant->numero_inventaire }}</td>
        </tr>
        <tr>
            <th>Désignation</th>
            <td>{{ $roulant->designation }}</td>
        </tr>
        <tr>
            <th>Numéro de Série</th>
            <td>{{ $roulant->numero_serie }}</td>
        </tr>
        <tr>
            <th>Date d'Acquisition</th>
            <td>{{ $roulant->date_acquisition }}</td>
        </tr>
    </table>

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
                        <a href="{{ route('detenteur.edit', $detenteur->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('roulants.list') }}" class="btn btn-primary mt-4">Retour à la liste</a>
</div>
@endsection
