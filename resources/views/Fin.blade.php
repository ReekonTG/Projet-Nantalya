@extends('layout')

@section('title', 'Fin du Suivi du Matériel')

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

    <h3 class="mt-5 text-center text-secondary">📋 Liste des Détenteurs</h3>

    <!-- Tableau des informations enregistrées -->
    <div class="table-responsive shadow-lg">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Date</th>
                    <th>Nom</th>
                    <th>Organisations</th>
                    <th>Contact</th>
                    <th>Nombre</th>
                    <th>Situation</th>
                    <th>Date de Retour</th>
                    <th>Observation</th>
                    <th>Actions</th> <!-- Nouvelle colonne pour les actions -->
                </tr>
            </thead>
            <tbody>
                @foreach($historique as $item)
                <tr>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->nom }}</td>
                    <td>{{ $item->organisme }}</td>
                    <td>{{ $item->contact }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->situation }}</td>
                    <td>{{ $item->date_retour }}</td>
                    <td>{{ $item->observation }}</td>
                    <td>
                    <button type="button" class="btn btn-primary btnEdit" 
                        data-bs-toggle="modal" 
                        data-bs-target="#modaleModifierHistorique"
                        data-id="{{ $item->id }}" 
                        data-nom="{{ $item->nom }}"
                        data-organisme="{{ $item->organisme }}"
                        data-contact="{{ $item->contact }}"
                        data-nombre="{{ $item->nombre }}"
                        data-situation="{{ $item->situation }}"
                        data-date="{{ $item->date }}"
                        data-date_retour="{{ $item->date_retour }}"
                        data-observation="{{ $item->observation }}">
                            Modifier
                    </button>
                    </td> <!-- Le bouton Modifier est dans la dernière colonne -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bouton retour -->
    <div class="text-center mt-4">
        <a href="{{ route('materiels.index') }}" class="btn btn-primary btn-lg">Retour à la liste</a>
    </div>
</div>
<!-- Modale pour la modification -->
<div class="modal fade" id="modaleModifierHistorique" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier les informations</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formModif">
                        <input type="hidden" id="editId">
                        <div class="mb-3">
                            <label for="editNom" class="form-label">Nom</label>
                            <input type="text" id="editNom" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="editOrganisme" class="form-label">Organisations</label>
                            <input type="text" id="editOrganisme" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="editContact" class="form-label">Contact</label>
                            <input type="text" id="editContact" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="editNombre" class="form-label">Nombre</label>
                            <input type="number" id="editNombre" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="editSituation" class="form-label">Situation</label>
                            <input type="text" id="editSituation" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="editDateRetour" class="form-label">Date de Retour</label>
                            <input type="date" id="editDateRetour" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="editObservation" class="form-label">Observation</label>
                            <textarea id="editObservation" class="form-control" rows="2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btnEdit').forEach(button => {
        button.addEventListener('click', function() {
            document.getElementById('editId').value = this.getAttribute('data-id');
            document.getElementById('editNom').value = this.getAttribute('data-nom');
            document.getElementById('editOrganisme').value = this.getAttribute('data-organisme');
            document.getElementById('editContact').value = this.getAttribute('data-contact');
            document.getElementById('editNombre').value = this.getAttribute('data-nombre');
            document.getElementById('editSituation').value = this.getAttribute('data-situation');
            document.getElementById('editDateRetour').value = this.getAttribute('data-date_retour');
            document.getElementById('editObservation').value = this.getAttribute('data-observation');
        });
    });
});
</script>
@endsection

