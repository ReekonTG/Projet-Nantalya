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
                    <button type="button" class="btn btn-primary btnEdit" 
                        data-bs-toggle="modal" 
                        data-bs-target="#modaleModifierDetenteur"
                        data-id="{{ $detenteur->id }}" 
                        data-nom="{{ $detenteur->nom }}"
                        data-organisations="{{ $detenteur->organisations }}"
                        data-contact="{{ $detenteur->contact }}"
                        data-nombre="{{ $detenteur->nombre }}"
                        data-situation="{{ $detenteur->situation }}"
                        data-date="{{ $detenteur->date }}"
                        data-date_retour="{{ $detenteur->date_retour }}"
                        data-observation="{{ $detenteur->observation }}">
                        Modifier
                    </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('roulants.list') }}" class="btn btn-primary mt-4">Retour à la liste</a>
</div>
<!-- Modale Bootstrap pour modification -->
<div class="modal fade" id="modaleModifierDetenteur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier le détenteur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formModifierDetenteur">
                    @csrf
                    <input type="hidden" id="detenteur_id" name="id">

                    <!-- Input pour la Date -->
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>

                    <!-- Input pour le Nom -->
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>

                    <!-- Input pour les Organisations -->
                    <div class="mb-3">
                        <label for="organisations" class="form-label">Organisations</label>
                        <input type="text" class="form-control" id="organisations" name="organisations" required>
                    </div>

                    <!-- Input pour le Contact -->
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" required>
                    </div>

                    <!-- Input pour le Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="number" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <!-- Input pour la Situation -->
                    <div class="mb-3">
                        <label for="situation" class="form-label">Situation</label>
                        <input type="text" class="form-control" id="situation" name="situation" required>
                    </div>

                    <!-- Input pour la Date de Retour -->
                    <div class="mb-3">
                        <label for="date_retour" class="form-label">Date de Retour</label>
                        <input type="date" class="form-control" id="date_retour" name="date_retour">
                    </div>

                    <!-- Input pour les Observations -->
                    <div class="mb-3">
                        <label for="observation" class="form-label">Observation</label>
                        <textarea class="form-control" id="observation" name="observation"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Pré-remplir les champs de la modale avec les données correspondantes
    $(document).on('click', '.btnEdit', function() {
    // Récupère les données depuis les attributs data- du bouton
    $('#detenteur_id').val($(this).data('id'));
    $('#nom').val($(this).data('nom'));
    $('#organisations').val($(this).data('organisations')); // Récupérer l'organisation
    $('#contact').val($(this).data('contact'));
    $('#nombre').val($(this).data('nombre')); // Récupérer le nombre
    $('#situation').val($(this).data('situation'));
    $('#date').val($(this).data('date'));
    $('#date_retour').val($(this).data('date_retour'));
    $('#observation').val($(this).data('observation') || ''); // Laisser vide s'il n'y a pas de donnée
});


    // Soumettre le formulaire de modification avec AJAX
    $(document).on('submit', '#formModifierDetenteur', function(e) {
        e.preventDefault(); // Empêche le rechargement de la page

        let formData = $(this).serialize();
        let id = $('#detenteur_id').val();

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
                alert('Erreur lors de la modification.');
            }
        });
    });
</script>
@endsection

