@extends('layout')

@section('title', 'Enregistrer un Matériel')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container py-5">
    <div class="card shadow-lg" style="border-radius: 15px;">
        <!-- En-tête de la carte -->
        <div class="card-header text-white text-center" style="background: linear-gradient(135deg, #4e73df, #224abe); border-radius: 15px 15px 0 0;">
            <h2><i class="fas fa-tools"></i> Ajout des Matériels Informatiques</h2>
        </div>
        <!-- Corps de la carte -->
        <div class="card-body" style="background-color: #f8f9fc; border-radius: 0 0 15px 15px;">
            <!-- Formulaire d'enregistrement -->
            <form action="{{ route('materiels') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <!-- Numéro d'Inventaire et Désignation -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="numero_inventaire" class="form-label">
                            <i class="fas fa-barcode"></i> Numéro d'Inventaire
                        </label>
                        <input type="text" class="form-control shadow-sm" id="numero_inventaire" name="numero_inventaire" required>
                        <div class="invalid-feedback">Veuillez fournir un numéro d'inventaire.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="designation" class="form-label">
                            <i class="fas fa-tag"></i> Désignation
                        </label>
                        <input type="text" class="form-control shadow-sm" id="designation" name="designation" required>
                        <div class="invalid-feedback">Veuillez fournir une désignation.</div>
                    </div>
                </div>

                <!-- Numéro de Série -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="numero_serie" class="form-label">
                            <i class="fas fa-hashtag"></i> Numéro de Série
                        </label>
                        <input type="text" class="form-control shadow-sm" id="numero_serie" name="numero_serie">
                    </div>
                </div>

                <!-- Date d'Acquisition, Mode de Paiement, BC / BL -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="date_acquisition" class="form-label">
                            <i class="fas fa-calendar-alt"></i> Date d'Acquisition
                        </label>
                        <input type="date" class="form-control shadow-sm" id="date_acquisition" name="date_acquisition">
                    </div>
                    <div class="col-md-4">
                        <label for="mode_paiement" class="form-label">
                            <i class="fas fa-money-bill-wave"></i> Mode de Paiement
                        </label>
                        <input type="text" class="form-control shadow-sm" id="mode_paiement" name="mode_paiement" placeholder="Ex: Espèces, Virement, Chèque">
                    </div>
                    <div class="col-md-4">
                        <label for="bc_bl" class="form-label">
                            <i class="fas fa-file-invoice"></i> BC / BL
                        </label>
                        <input type="text" class="form-control shadow-sm" id="bc_bl" name="bc_bl">
                    </div>
                </div>

                <!-- Bailleurs, Nature, Situations -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="bailleurs" class="form-label">
                            <i class="fas fa-handshake"></i> Bailleurs
                        </label>
                        <input type="text" class="form-control shadow-sm" id="bailleurs" name="bailleurs">
                    </div>
                    <div class="col-md-4">
                        <label for="nature" class="form-label">
                            <i class="fas fa-leaf"></i> Nature
                        </label>
                        <input type="number" class="form-control shadow-sm" id="nature" name="nature" required>
                        <div class="invalid-feedback">Veuillez entrer un nombre.</div>
                    </div>
                    <div class="col-md-4">
                        <label for="situations" class="form-label">
                            <i class="fas fa-map-marker-alt"></i> Situations
                        </label>
                        <input type="text" class="form-control shadow-sm" id="situations" name="situations">
                    </div>
                </div>

                <!-- Utilisateurs, Repère, Fournisseurs -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="utilisateurs" class="form-label">
                            <i class="fas fa-users"></i> Utilisateurs
                        </label>
                        <select class="form-control shadow-sm" id="utilisateurs" name="utilisateurs" required>
                            <option value="" disabled selected>Choisissez un utilisateur</option>
                            @foreach($personnels as $personnel)
                                <option value="{{ $personnel->prenom }}">{{ $personnel->prenom }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-4">
                        <label for="repere" class="form-label">
                            <i class="fas fa-map-pin"></i> Repère
                        </label>
                        <input type="text" class="form-control shadow-sm" id="repere" name="repere">
                    </div>
                    <div class="col-md-4">
                        <label for="fournisseurs" class="form-label">
                            <i class="fas fa-truck"></i> Fournisseurs
                        </label>
                        <input type="text" class="form-control shadow-sm" id="fournisseurs" name="fournisseurs">
                    </div>
                </div>

                <!-- Coût Unitaire et Coût Total -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="cout_unitaire" class="form-label">
                            <i class="fas fa-coins"></i> Coût Unitaire
                        </label>
                        <input type="number" step="0.01" class="form-control shadow-sm" id="cout_unitaire" name="cout_unitaire">
                    </div>
                    <!-- Coût Total (Auto-calculé) -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="cout_total" class="form-label"><i class="fas fa-money-bill-alt"></i> Coût Total</label>
                        <input type="number" step="0.01" class="form-control shadow-sm" id="cout_total" name="cout_total" readonly>
                    </div>
                </div>
                </div>

                <!-- Boutons -->
                <div class="d-grid gap-3 mb-4">
                    <button type="submit" class="btn btn-warning btn-lg shadow-sm" style="background: linear-gradient(135deg, #ff9a9e, #fad0c4); border: none;">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                    <a href="{{ route('listeInfo') }}" class="btn btn-primary btn-lg shadow-sm" style="background: linear-gradient(135deg, #6a11cb, #2575fc); border: none;">
                        <i class="fas fa-list"></i> Liste des Matériels Informatiques
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Ajout de FontAwesome pour les icônes -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Ajout de Google Fonts pour une typographie moderne -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<!-- Styles personnalisés -->
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    .form-control {
        border-radius: 8px;
        border: 1px solid #ddd;
    }
    .btn {
        transition: all 0.3s;
        border-radius: 8px;
    }
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .invalid-feedback {
        display: none;
        color: #dc3545;
    }
    .was-validated .form-control:invalid ~ .invalid-feedback {
        display: block;
    }
</style>

<!-- Script pour la validation Bootstrap -->
<script>
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let coutUnitaireInput = document.getElementById('cout_unitaire');
        let natureInput = document.getElementById('nature');
        let coutTotalInput = document.getElementById('cout_total');

        function updateCoutTotal() {
            let coutUnitaire = parseFloat(coutUnitaireInput.value) || 0;
            let nature = parseFloat(natureInput.value) || 0;
            coutTotalInput.value = (coutUnitaire * nature).toFixed(2); // Arrondi à 2 décimales
        }

        coutUnitaireInput.addEventListener('input', updateCoutTotal);
        natureInput.addEventListener('input', updateCoutTotal);
    });
</script>
@endsection