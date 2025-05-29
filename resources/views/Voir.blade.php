@extends('layout')

@section('title', 'Détails du Matériel')

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

    <!-- Formulaire des informations supplémentaires -->
    <div class="mt-5 shadow-lg p-4 bg-light rounded">
        <h3 class="text-center text-secondary mb-4">📋 Ajouter des Informations Supplémentaires</h3>
        <form action="{{ route('materiels.ajouterInformations', $materiel->id) }}" method="POST">
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
                    <label for="organisme" class="form-label">Organisations</label>
                    <input type="text" id="organisme" name="organisme" class="form-control">
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
                    <textarea id="observation" name="observation" class="form-control" rows="1"></textarea>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success btn-lg">Enregistrer</button>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('materiels.fin', ['id' => $materiel->id]) }}" class="btn btn-danger btn-lg">Liste</a>
            </div>
        </form>
    </div>

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <strong>⚠️ Erreur :</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <!-- Bouton retour -->
    <div class="text-center mt-4">
        <a href="{{ route('materiels.index') }}" class="btn btn-primary btn-lg">Retour à la liste</a>
    </div>
<!-- Formulaire de suivi des matériels -->
<!-- Formulaire d'ajout de suivi -->
<div class="mt-5 shadow-lg p-4 bg-light rounded">
    <h4 class="text-center text-secondary mb-4">📋 Ajouter un Suivi</h4>
    <form action="{{ route('suivimateriels.store1', $materiel->id) }}" method="POST">
        @csrf
    <div class="row g-3">
        <div class="col-md-4">
            <label for="date_suivi">Date de Suivi</label>
            <input type="date" name="date_suivi" id="date_suivi" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label for="organisme">Organisme</label>
            <input type="text" name="organisme" id="organisme" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label for="contact">Contact</label>
            <input type="text" name="contact" id="contact" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label for="nombre">Nombre</label>
            <input type="number" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label for="situation">Situation</label>
            <input type="text" name="situation" id="situation" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label for="constation">Constation</label>
            <input type="text" name="constation" id="constation" class="form-control" required>
        </div>

        <div class="col-md-4">
            <label for="date_retour">Date de Retour (facultatif)</label>
            <input type="date" name="date_retour" id="date_retour" class="form-control">
        </div>

        <div class="col-md-4">
            <label for="observation">Observation</label>
            <textarea name="observation" id="observation" rows="4" class="form-control" required></textarea>
        </div>
    </div>
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-success btn-block mt-4">Ajouter le Suivi</button>
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('suivi.materiel', $materiel->id) }}" class="btn btn-primary btn-block mt-2">Afficher les Suivis</a>
    </div>
    </form>
</div>
</div>




</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@endsection
