@extends('layout')

@section('title', 'Modifier le Matériel')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container py-5">
    <h2 class="text-center text-primary">Modifier le Matériel</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('materiels.update', $materiel->id) }}" method="POST" class="shadow p-4 rounded">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="numero_inventaire" class="form-label">Numéro d'Inventaire</label>
            <input type="text" name="numero_inventaire" id="numero_inventaire" class="form-control" value="{{ $materiel->numero_inventaire }}" required>
        </div>

        <div class="mb-3">
            <label for="designation" class="form-label">Désignation</label>
            <input type="text" name="designation" id="designation" class="form-control" value="{{ $materiel->designation }}" required>
        </div>

        <div class="mb-3">
            <label for="numero_serie" class="form-label">Numéro de Série</label>
            <input type="text" name="numero_serie" id="numero_serie" class="form-control" value="{{ $materiel->numero_serie }}" required>
        </div>

        <div class="mb-3">
            <label for="motifs" class="form-label">Motifs</label>
            <input type="text" name="motifs" id="motifs" class="form-control" value="{{ $materiel->motifs }}">
        </div>

        <div class="mb-3">
            <label for="date_acquisition" class="form-label">Date d'Acquisition</label>
            <input type="date" name="date_acquisition" id="date_acquisition" class="form-control" value="{{ $materiel->date_acquisition }}">
        </div>

        <div class="mb-3">
            <label for="mode_paiement" class="form-label">Mode de Paiement</label>
            <input type="text" name="mode_paiement" id="mode_paiement" class="form-control" value="{{ $materiel->mode_paiement }}">
        </div>

        <div class="mb-3">
            <label for="bc_bl" class="form-label">BC / BL</label>
            <input type="text" name="bc_bl" id="bc_bl" class="form-control" value="{{ $materiel->bc_bl }}">
        </div>

        <div class="mb-3">
            <label for="bailleurs" class="form-label">Bailleurs</label>
            <input type="text" name="bailleurs" id="bailleurs" class="form-control" value="{{ $materiel->bailleurs }}">
        </div>

        <div class="mb-3">
            <label for="nature" class="form-label">Nature</label>
            <input type="text" name="nature" id="nature" class="form-control" value="{{ $materiel->nature }}">
        </div>

        <div class="mb-3">
            <label for="situations" class="form-label">Situations</label>
            <input type="text" name="situations" id="situations" class="form-control" value="{{ $materiel->situations }}">
        </div>

        <div class="mb-3">
            <label for="utilisateurs" class="form-label">Utilisateurs</label>
            <input type="text" name="utilisateurs" id="utilisateurs" class="form-control" value="{{ $materiel->utilisateurs }}">
        </div>

        <div class="mb-3">
            <label for="repere" class="form-label">Repère</label>
            <input type="text" name="repere" id="repere" class="form-control" value="{{ $materiel->repere }}">
        </div>

        <div class="mb-3">
            <label for="fournisseurs" class="form-label">Fournisseurs</label>
            <input type="text" name="fournisseurs" id="fournisseurs" class="form-control" value="{{ $materiel->fournisseurs }}">
        </div>

        <div class="mb-3">
            <label for="cout_unitaire" class="form-label">Coût Unitaire</label>
            <input type="number" name="cout_unitaire" id="cout_unitaire" class="form-control" value="{{ $materiel->cout_unitaire }}">
        </div>

        <div class="mb-3">
            <label for="cout_total" class="form-label">Coût Total</label>
            <input type="number" name="cout_total" id="cout_total" class="form-control" value="{{ $materiel->cout_total }}">
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer les Modifications</button>
        
    </form>
</div>
@endsection
