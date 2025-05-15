@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3>Situation Annuelle - Matériel : {{ $materiel_type}} (ID: {{ $materiel->id }})</h3>
        </div>
        <div class="card-body">
            <!-- Formulaire pour enregistrer une situation annuelle -->
            <form action="{{ route('situation.store') }}" method="POST">
                @csrf

                <!-- ID et type du matériel -->
                <input type="hidden" name="materiel_id" value="{{ $materiel->id }}">
                <input type="hidden" name="materiel_type" value="{{ $materiel_type }}">

                <!-- Champ pour l'année -->
                <div class="mb-3">
                    <label for="annee" class="form-label">Année</label>
                    <input type="text" name="annee" id="annee" class="form-control" placeholder="Ex: 2024" required>
                </div>

                <!-- Champ pour la localité -->
                <div class="mb-3">
                    <label for="localite" class="form-label">Localité</label>
                    <input type="text" name="localite" id="localite" class="form-control" required>
                </div>

                <!-- Champ pour la situation -->
                <div class="mb-3">
                    <label for="situation" class="form-label">Situation</label>
                    <input type="text" name="situation" id="situation" class="form-control" required>
                </div>

                <!-- Bouton pour enregistrer la situation annuelle -->
                <button type="submit" class="btn btn-success">Enregistrer</button>

                 <!-- Bouton pour voir l'inventaire -->
                 <a href="{{ route('tout.inventaire') }}" class="btn btn-primary">Voir tout l'inventaire</a>

            </form>
        </div>
    </div>
</div>
@endsection
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif