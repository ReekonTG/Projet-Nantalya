@extends('layout')

@section('title', 'Modifier le Matériel')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container py-5">
    <div class="card shadow-lg" style="border-radius: 15px;">
        <div class="card-header text-white text-center" style="background-color: #4e73df; border-radius: 15px 15px 0 0;">
            <h2>Modifier le Matériel Informatique</h2>
        </div>
        <div class="card-body" style="background-color: #f8f9fc; border-radius: 0 0 15px 15px;">
            <form action="{{ route('materiels.update', $materiel->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Numéro d'Inventaire -->
                <div class="form-group">
                    <label for="numero_inventaire">Numéro d'Inventaire</label>
                    <input type="text" name="numero_inventaire" class="form-control" value="{{ $materiel->numero_inventaire }}" required>
                </div>

                <!-- Désignation -->
                <div class="form-group">
                    <label for="designation">Désignation</label>
                    <input type="text" name="designation" class="form-control" value="{{ $materiel->designation }}" required>
                </div>

                <!-- Numéro de Série -->
                <div class="form-group">
                    <label for="numero_serie">Numéro de Série</label>
                    <input type="text" name="numero_serie" class="form-control" value="{{ $materiel->numero_serie }}">
                </div>

                <!-- Date d'Acquisition -->
                <div class="form-group">
                    <label for="date_acquisition">Date d'Acquisition</label>
                    <input type="date" name="date_acquisition" class="form-control" value="{{ $materiel->date_acquisition }}">
                </div>

                <!-- Mode de Paiement -->
                <div class="form-group">
                    <label for="mode_paiement">Mode de Paiement</label>
                    <input type="text" name="mode_paiement" class="form-control" value="{{ $materiel->mode_paiement }}">
                </div>

                <!-- BC / BL -->
                <div class="form-group">
                    <label for="bc_bl">BC / BL</label>
                    <input type="text" name="bc_bl" class="form-control" value="{{ $materiel->bc_bl }}">
                </div>

                <!-- Bailleurs -->
                <div class="form-group">
                    <label for="bailleurs">Bailleurs</label>
                    <input type="text" name="bailleurs" class="form-control" value="{{ $materiel->bailleurs }}">
                </div>

                <!-- Nature -->
                <div class="form-group">
                    <label for="nature">Nature</label>
                    <input type="text" name="nature" class="form-control" value="{{ $materiel->nature }}">
                </div>

                <!-- Situations -->
                <div class="form-group">
                    <label for="situations">Situations</label>
                    <input type="text" name="situations" class="form-control" value="{{ $materiel->situations }}">
                </div>

                <!-- Utilisateurs -->
                <div class="form-group">
                    <label for="utilisateurs">Utilisateurs</label>
                    <input type="text" name="utilisateurs" class="form-control" value="{{ $materiel->utilisateurs }}">
                </div>

                <!-- Repère -->
                <div class="form-group">
                    <label for="repere">Repère</label>
                    <input type="text" name="repere" class="form-control" value="{{ $materiel->repere }}">
                </div>

                <!-- Fournisseurs -->
                <div class="form-group">
                    <label for="fournisseurs">Fournisseurs</label>
                    <input type="text" name="fournisseurs" class="form-control" value="{{ $materiel->fournisseurs }}">
                </div>

                <!-- Coût Unitaire -->
                <div class="form-group">
                    <label for="cout_unitaire">Coût Unitaire</label>
                    <input type="number" step="0.01" name="cout_unitaire" class="form-control" value="{{ $materiel->cout_unitaire }}" required>
                </div>

                <!-- Coût Total -->
                <div class="form-group">
                    <label for="cout_total">Coût Total</label>
                    <input type="number" step="0.01" name="cout_total" class="form-control" value="{{ $materiel->cout_total }}" required>
                </div>

                <button type="submit" class="btn btn-primary btn-lg mt-4">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection
