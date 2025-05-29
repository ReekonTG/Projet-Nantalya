@extends('layout')

@section('title', 'Détails du Matériel Informatique')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container py-5">
    <h2 class="mb-4 text-center text-primary font-weight-bold">📋 Détails du Matériel Informatique</h2>

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
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Formulaire des informations supplémentaires -->
<div class="mt-5 shadow-lg p-4 bg-light rounded">
    <h3 class="text-center text-secondary mb-4">📋 Ajouter des Informations Supplémentaires</h3>
    <form action="{{ route('informatique.ajouterInformations', $materiel->id) }}" method="POST">

        @csrf
        <div class="row g-3">
            <div class="col-md-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" id="date" name="date" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="nom" class="form-label">Nom</label>
                <select id="nom" name="nom" class="form-control" required>
                    <option value="">  </option>
                    @foreach($personnels as $personnel)
                    <option value="{{ $personnel->nom }} {{ $personnel->prenom }}">
                    {{ $personnel->nom }} {{ $personnel->prenom }}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-3">
                <label for="organisations" class="form-label">Organisations</label>
                <input type="text" id="organisations" name="organisations" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" id="contact" name="contact" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="number" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="situation" class="form-label">Situation</label>
                <input type="text" id="situation" name="situation" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="date_retour" class="form-label">Date de Retour</label>
                <input type="date" id="date_retour" name="date_retour" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="observation" class="form-label">Observation</label>
                <textarea id="observation" name="observation" class="form-control" rows="1" ></textarea>
            </div>
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success btn-lg">Enregistrer</button>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('detenteur-info.show', $materiel->id) }}" class="btn btn-info btn-lg">📄 Fiche</a>
        </div>
    </form>
</div>

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <strong>⚠️ Erreur :</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


     <!-- Formulaire d'ajout d'inventaire -->
     <div class="mt-5 shadow-lg p-4 bg-light rounded">
    <h3 class="text-center text-secondary mb-4">📋 Ajouter un Suivi</h3>
    
    <form action="{{ route('suiviinfo.store') }}" method="POST">
        @csrf
        <input type="hidden" name="informatique_id" value="{{ $materiel->id }}">
        
        <div class="row g-3">
            <div class="col-md-4">
                <label for="date" class="form-label">Date</label>
                <input type="date" id="date" name="date" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="organisations" class="form-label">Organisme / Poste</label>
                <input type="text" id="organisations" name="organisations" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" id="contact" name="contact" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="number" id="nombre" name="nombre" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="situation" class="form-label">Situation</label>
                <input type="text" id="situation" name="situation" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="constatation" class="form-label">Constatation</label>
                <input type="text" id="constatation" name="constatation" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="date_retour" class="form-label">Date de Retour</label>
                <input type="date" id="date_retour" name="date_retour" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="observation" class="form-label">Observation</label>
                <textarea id="observation" name="observation" class="form-control" rows="1"></textarea>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success btn-lg">Enregistrer</button>
        </div>   
        <div class="text-center mt-4">
            <a href="{{ route('suiviinfo.show', ['suiviinfo' => $materiel->id]) }}" class="btn btn-primary btn-lg">Voir Suivi</a>
        </div>
    </form>
</div>

@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif



<!-- Bouton pour voir l'inventaire -->

<div class="text-center mt-4">
   
</div>

</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@endsection
