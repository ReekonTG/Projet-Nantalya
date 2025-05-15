@extends('layout')

@section('title', 'Modifier un Roulant')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <div class="container">
        <h2>Modifier le Roulant</h2>
        
        <!-- Affichage des messages de succès ou d'erreur -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('roulants.update', $roulant->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="numero_inventaire" class="form-label">Numéro d'Inventaire</label>
                    <input type="text" class="form-control" id="numero_inventaire" name="numero_inventaire" value="{{ old('numero_inventaire', $roulant->numero_inventaire) }}" required>
                    <div class="invalid-feedback">Veuillez fournir un numéro d'inventaire.</div>
                </div>
                <div class="col-md-6">
                    <label for="designation" class="form-label">Désignation</label>
                    <input type="text" class="form-control" id="designation" name="designation" value="{{ old('designation', $roulant->designation) }}" required>
                    <div class="invalid-feedback">Veuillez fournir une désignation.</div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="numero_serie" class="form-label">Numéro de Série</label>
                    <input type="text" class="form-control" id="numero_serie" name="numero_serie" value="{{ old('numero_serie', $roulant->numero_serie) }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="date_acquisition" class="form-label">Date d'Acquisition</label>
                    <input type="date" class="form-control" id="date_acquisition" name="date_acquisition" value="{{ old('date_acquisition', $roulant->date_acquisition) }}">
                </div>
                <div class="col-md-4">
                    <label for="mode_paiement" class="form-label">Mode de Paiement</label>
                    <input type="text" class="form-control" id="mode_paiement" name="mode_paiement" value="{{ old('mode_paiement', $roulant->mode_paiement) }}" placeholder="Ex: Espèces, Virement, Chèque">
                </div>
                <div class="col-md-4">
                    <label for="bc_bl" class="form-label">BC / BL</label>
                    <input type="text" class="form-control" id="bc_bl" name="bc_bl" value="{{ old('bc_bl', $roulant->bc_bl) }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="bailleurs" class="form-label">Bailleurs</label>
                    <input type="text" class="form-control" id="bailleurs" name="bailleurs" value="{{ old('bailleurs', $roulant->bailleurs) }}">
                </div>
                <div class="col-md-4">
                    <label for="nature" class="form-label">Nature</label>
                    <input type="text" class="form-control" id="nature" name="nature" value="{{ old('nature', $roulant->nature) }}">
                </div>
                <div class="col-md-4">
                    <label for="situations" class="form-label">Situations</label>
                    <input type="text" class="form-control" id="situations" name="situations" value="{{ old('situations', $roulant->situations) }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="utilisateurs" class="form-label">Utilisateurs</label>
                    <input type="text" class="form-control" id="utilisateurs" name="utilisateurs" value="{{ old('utilisateurs', $roulant->utilisateurs) }}">
                </div>
                <div class="col-md-4">
                    <label for="repere" class="form-label">Repère</label>
                    <input type="text" class="form-control" id="repere" name="repere" value="{{ old('repere', $roulant->repere) }}">
                </div>
                <div class="col-md-4">
                    <label for="fournisseurs" class="form-label">Fournisseurs</label>
                    <input type="text" class="form-control" id="fournisseurs" name="fournisseurs" value="{{ old('fournisseurs', $roulant->fournisseurs) }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cout_unitaire" class="form-label">Coût Unitaire</label>
                    <input type="number" step="0.01" class="form-control" id="cout_unitaire" name="cout_unitaire" value="{{ old('cout_unitaire', $roulant->cout_unitaire) }}">
                </div>
                <div class="col-md-6">
                    <label for="cout_total" class="form-label">Coût Total</label>
                    <input type="number" step="0.01" class="form-control" id="cout_total" name="cout_total" value="{{ old('cout_total', $roulant->cout_total) }}">
                </div>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-warning btn-lg">Mettre à jour</button>
            </div>
        </form>
    </div>
@endsection
