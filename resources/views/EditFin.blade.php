@extends('layout')

@section('title', 'Modifier le Détenteur')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<div class="container py-5">
    <div class="card shadow-lg p-4">
        <h2 class="mb-4 text-center text-primary font-weight-bold">✏️ Modifier le Détenteur</h2>

        <form action="{{ route('detenteur.updatemateriel', $detenteur->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label class="fw-bold">👤 Nom :</label>
                <input type="text" name="nom" class="form-control" value="{{ $detenteur->nom }}" required>
            </div>

            <div class="form-group mb-3">
                <label class="fw-bold">🏢 Organisation :</label>
                <input type="text" name="organisme" class="form-control" value="{{ $detenteur->organisme }}" required>
            </div>

            <div class="form-group mb-3">
                <label class="fw-bold">📞 Contact :</label>
                <input type="text" name="contact" class="form-control" value="{{ $detenteur->contact }}" required>
            </div>

            <div class="form-group mb-3">
                <label class="fw-bold">🔢 Nombre :</label>
                <input type="number" name="nombre" class="form-control" value="{{ $detenteur->nombre }}" required>
            </div>

            <div class="form-group mb-3">
                <label class="fw-bold">📍 Situation :</label>
                <input type="text" name="situation" class="form-control" value="{{ $detenteur->situation }}" required>
            </div>

            <div class="form-group mb-3">
                <label class="fw-bold">📅 Date de Retour :</label>
                <input type="date" name="date_retour" class="form-control" value="{{ $detenteur->date_retour }}">
            </div>

            <div class="form-group mb-4">
                <label class="fw-bold">📝 Observation :</label>
                <textarea name="observation" class="form-control" rows="3" required>{{ $detenteur->observation }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success btn-lg">
                    ✅ Enregistrer
                </button>
                <a href="{{ route('materiels.fin', $detenteur->materiel_id) }}" class="btn btn-outline-secondary btn-lg">
                    ❌ Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
