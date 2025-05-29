@extends('layout')

@section('title', 'Modifier un Roulant')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<style>
    body {
        background: #f9fafb;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .form-container {
        background: white;
        border: 2px solid #0d6efd; /* bleu Bootstrap */
        border-radius: 12px;
        padding: 30px 40px;
        max-width: 900px;
        margin: 40px auto 80px auto;
        box-shadow: 0 8px 20px rgb(13 110 253 / 0.15);
        transition: box-shadow 0.3s ease-in-out;
    }
    .form-container:hover {
        box-shadow: 0 12px 35px rgb(13 110 253 / 0.3);
    }
    h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #0d6efd;
        font-weight: 700;
    }
    label {
        font-weight: 600;
        color: #212529;
    }
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 8px rgba(13, 110, 253, 0.4);
        transition: 0.3s;
    }
    .btn-warning {
        background-color: #ffc107;
        border: none;
        font-weight: 600;
        letter-spacing: 0.05em;
        transition: background-color 0.3s ease;
    }
    .btn-warning:hover {
        background-color: #e0a800;
    }
    .alert {
        max-width: 700px;
        margin: 15px auto;
        border-radius: 8px;
        font-weight: 600;
    }
</style>

<div class="form-container">
    <h2>Modifier le Roulant</h2>

    <!-- Messages succès / erreur -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    @endif

    <form action="{{ route('roulants.update', $roulant->id) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="numero_inventaire" class="form-label">Numéro d'Inventaire <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('numero_inventaire') is-invalid @enderror" id="numero_inventaire" name="numero_inventaire" value="{{ old('numero_inventaire', $roulant->numero_inventaire) }}" required>
                @error('numero_inventaire')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="invalid-feedback">Veuillez fournir un numéro d'inventaire.</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="designation" class="form-label">Désignation <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('designation') is-invalid @enderror" id="designation" name="designation" value="{{ old('designation', $roulant->designation) }}" required>
                @error('designation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="invalid-feedback">Veuillez fournir une désignation.</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="numero_serie" class="form-label">Numéro de Série</label>
                <input type="text" class="form-control" id="numero_serie" name="numero_serie" value="{{ old('numero_serie', $roulant->numero_serie) }}">
            </div>
            <div class="col-md-6">
                <label for="date_acquisition" class="form-label">Date d'Acquisition</label>
                <input type="date" class="form-control" id="date_acquisition" name="date_acquisition" value="{{ old('date_acquisition', $roulant->date_acquisition) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="mode_paiement" class="form-label">Mode de Paiement</label>
                <input type="text" class="form-control" id="mode_paiement" name="mode_paiement" value="{{ old('mode_paiement', $roulant->mode_paiement) }}" placeholder="Ex: Espèces, Virement, Chèque">
            </div>
            <div class="col-md-4">
                <label for="bc_bl" class="form-label">BC / BL</label>
                <input type="text" class="form-control" id="bc_bl" name="bc_bl" value="{{ old('bc_bl', $roulant->bc_bl) }}">
            </div>
            <div class="col-md-4">
                <label for="bailleurs" class="form-label">Bailleurs</label>
                <input type="text" class="form-control" id="bailleurs" name="bailleurs" value="{{ old('bailleurs', $roulant->bailleurs) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="nature" class="form-label">Nature</label>
                <input type="text" class="form-control" id="nature" name="nature" value="{{ old('nature', $roulant->nature) }}">
            </div>
            <div class="col-md-4">
                <label for="situations" class="form-label">Situations</label>
                <input type="text" class="form-control" id="situations" name="situations" value="{{ old('situations', $roulant->situations) }}">
            </div>
            <div class="col-md-4">
                <label for="utilisateurs" class="form-label">Utilisateurs</label>
                <input type="text" class="form-control" id="utilisateurs" name="utilisateurs" value="{{ old('utilisateurs', $roulant->utilisateurs) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="repere" class="form-label">Repère</label>
                <input type="text" class="form-control" id="repere" name="repere" value="{{ old('repere', $roulant->repere) }}">
            </div>
            <div class="col-md-4">
                <label for="fournisseurs" class="form-label">Fournisseurs</label>
                <input type="text" class="form-control" id="fournisseurs" name="fournisseurs" value="{{ old('fournisseurs', $roulant->fournisseurs) }}">
            </div>
            <div class="col-md-4">
                <label for="cout_unitaire" class="form-label">Coût Unitaire</label>
                <input type="number" step="0.01" class="form-control" id="cout_unitaire" name="cout_unitaire" value="{{ old('cout_unitaire', $roulant->cout_unitaire) }}">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4 offset-md-8">
                <label for="cout_total" class="form-label">Coût Total</label>
                <input type="number" step="0.01" class="form-control" id="cout_total" name="cout_total" value="{{ old('cout_total', $roulant->cout_total) }}">
            </div>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-warning btn-lg shadow-sm">Mettre à jour</button>
        </div>
    </form>
</div>

@endsection
