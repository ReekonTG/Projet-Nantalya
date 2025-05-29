@extends('layout')

@section('title', 'Détenteurs du Roulant')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container">
    <h2 class="text-center mb-4">Détails du Roulant</h2>
    
    <!-- Tableau du roulant -->
    <table class="table table-bordered">
        <tr>
            <th>Numéro d'Inventaire</th>
            <td>{{ $roulant->numero_inventaire }}</td>
        </tr>
        <tr>
            <th>Désignation</th>
            <td>{{ $roulant->designation }}</td>
        </tr>
        <tr>
            <th>Numéro de Série</th>
            <td>{{ $roulant->numero_serie }}</td>
        </tr>
        <tr>
            <th>Date d'Acquisition</th>
            <td>{{ $roulant->date_acquisition }}</td>
        </tr>
    </table>

    <h2 class="text-center mt-5 mb-4">Liste des Détenteurs</h2>

    <!-- Tableau des détenteurs -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Nom</th>
                <th>Organisations</th>
                <th>Contact</th>
                <th>Nombre</th>
                <th>Situation</th>
                <th>Date de Retour</th>
                <th>Observation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detenteurs as $detenteur)
                <tr>
                    <td>{{ $detenteur->date }}</td>
                    <td>{{ $detenteur->nom }}</td>
                    <td>{{ $detenteur->organisations }}</td>
                    <td>{{ $detenteur->contact }}</td>
                    <td>{{ $detenteur->nombre }}</td>
                    <td>{{ $detenteur->situation }}</td>
                    <td>{{ $detenteur->date_retour }}</td>
                    <td>{{ $detenteur->observation }}</td>
                    <td>
                        <!-- Bouton d’édition -->
                        <button class="btn btn-primary edit-button" data-id="{{ $detenteur->id }}" 
                                data-date="{{ $detenteur->date }}"
                                data-nom="{{ $detenteur->nom }}"
                                data-organisations="{{ $detenteur->organisations }}"
                                data-contact="{{ $detenteur->contact }}"
                                data-nombre="{{ $detenteur->nombre }}"
                                data-situation="{{ $detenteur->situation }}"
                                data-date_retour="{{ $detenteur->date_retour }}"
                                data-observation="{{ $detenteur->observation }}">
                            Modifier
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="editForm">
      <div class="modal-content">
        <div class="modal-header"><h5 class="modal-title">Modifier</h5></div>
        <div class="modal-body">
          <input type="hidden" id="edit_id">
          <input type="date" id="edit_date" name="date" class="form-control mb-2">
          <input type="text" id="edit_nom" name="nom" class="form-control mb-2">
          <input type="text" id="edit_organisations" name="organisations" class="form-control mb-2">
          <input type="text" id="edit_contact" name="contact" class="form-control mb-2">
          <input type="number" id="edit_nombre" name="nombre" class="form-control mb-2">
          <input type="text" id="edit_situation" name="situation" class="form-control mb-2">
          <input type="date" id="edit_date_retour" name="date_retour" class="form-control mb-2">
          <textarea id="edit_observation" name="observation" class="form-control"></textarea>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Enregistrer</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).on('submit', '#formModifierDetenteur1', function(e) {
    e.preventDefault(); // Empêche le rechargement de la page

    let formData = $(this).serialize();
    let id = $('#detenteur_id').val();

    console.log("Données envoyées : ", formData); // Ajoutez ceci pour voir les données

    $.ajax({
        url: '/detenteur/update/' + id, // URL de mise à jour
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response) {
            alert(response.success); // Message de succès
            location.reload(); // Recharge la page
        },
        error: function(xhr) {
            console.log(xhr.responseText); // Affiche l'erreur en console
            alert('Erreur lors de la modification : ' + xhr.responseText); // Affiche l'erreur
        }
    });
});

</script>

@endsection
