@extends('layout')

@section('title', 'Détails du Roulant')

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

        <a href="{{ route('roulants.list') }}" class="btn btn-primary">Retour à la liste</a>

        <!-- Formulaire des informations supplémentaires -->
        <div class="mt-5 shadow-lg p-4 bg-light rounded">
            <h3 class="text-center text-secondary mb-4">📋 Ajouter des Informations Supplémentaires</h3>
            <form action="{{ route('detenteurRoulant.store', $roulant->id) }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" id="date" name="date" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control" required>
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
                        <textarea id="observation" name="observation" class="form-control" rows="1" required></textarea>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg">Enregistrer</button>
                </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('roulants.detenteurs', $roulant->id) }}" class="btn btn-info mt-3">
                Afficher les détenteurs</a>
            </div>
    </form>
</div>

        <!-- Formulaire de suivi du roulant -->
        <div class="container">
        <!-- Formulaire de suivi du roulant -->
        <div class="mt-5 shadow-lg p-4 bg-light rounded">
            <h3 class="text-center text-secondary mb-4">🚗 Ajouter un Suivi du Roulant</h3>
            <form action="{{ route('suiviRoulant.store', $roulant->id) }}" method="POST">

                @csrf
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="date_suivi" class="form-label">Date</label>
                        <input type="date" id="date_suivi" name="date_suivi" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="organisme" class="form-label">Organisme</label>
                        <input type="text" id="organisme" name="organisme" class="form-control" required>
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
                        <label for="constation" class="form-label">Constation</label>
                        <input type="text" id="constation" name="constation" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="date_retour" class="form-label">Date de Retour</label>
                        <input type="date" id="date_retour" name="date_retour" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="observation" class="form-label">Observation</label>
                        <textarea id="observation" name="observation" class="form-control" rows="1" required></textarea>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg">Ajouter Suivi</button>
                </div>
                <div class="text-center mt-4">
                
                    <a href="{{ route('suiviRoulant.index', $roulant->id) }}" class="btn btn-info mt-3">Afficher Suivi</a>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
@endsection
