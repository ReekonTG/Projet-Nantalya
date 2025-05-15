@extends('layout')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">Suivi du Matériel : <span class="text-success">{{ $materiel->nom }}</span></h2>

    <!-- Première carte pour afficher les informations du matériel -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="m-0">Informations du Matériel</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Marque</th>
                        <th>Date d'acquisition</th>
                        <th>Etat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $materiel->nom }}</td>
                        <td>{{ $materiel->type }}</td>
                        <td>{{ $materiel->marque }}</td>
                        <td>{{ $materiel->date_acquisition }}</td>
                        <td>{{ $materiel->etat }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Deuxième carte pour afficher les suivis du matériel -->
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h4 class="m-0">Suivis du Matériel</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Date de Suivi</th>
                        <th>Nom</th>
                        <th>Organisme</th>
                        <th>Contact</th>
                        <th>Nombre</th>
                        <th>Situation</th>
                        <th>Constation</th>
                        <th>Date de Retour</th>
                        <th>Observation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suivis as $suivi)
                        <tr>
                            <td>{{ $suivi->date_suivi }}</td>
                            <td>{{ $suivi->nom }}</td>
                            <td>{{ $suivi->organisme }}</td>
                            <td>{{ $suivi->contact }}</td>
                            <td>{{ $suivi->nombre }}</td>
                            <td>{{ $suivi->situation }}</td>
                            <td>{{ $suivi->constation }}</td>
                            <td>{{ $suivi->date_retour }}</td>
                            <td>{{ $suivi->observation }}</td>
                            <td>
                                <!-- Bouton Modifier -->
                                <a href="{{ route('suivimateriels.edit', $suivi->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
