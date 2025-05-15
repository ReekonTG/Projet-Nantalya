@extends('layout')

@section('title', 'Modifier le Détenteur')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container py-5">
    <h2 class="mb-4 text-center text-primary font-weight-bold">✏️ Modifier le Détenteur</h2>

    <form action="{{ route('detenteur.update', $detenteur->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nom :</label>
            <input type="text" name="nom" class="form-control" value="{{ $detenteur->nom }}" required>
        </div>

        <div class="form-group">
            <label>Organisation :</label>
            <input type="text" name="organisations" class="form-control" value="{{ $detenteur->organisations }}" required>
        </div>

        <div class="form-group">
            <label>Contact :</label>
            <input type="text" name="contact" class="form-control" value="{{ $detenteur->contact }}" required>
        </div>

        <div class="form-group">
            <label>Nombre :</label>
            <input type="number" name="nombre" class="form-control" value="{{ $detenteur->nombre }}" required>
        </div>

        <div class="form-group">
            <label>Situation :</label>
            <input type="text" name="situation" class="form-control" value="{{ $detenteur->situation }}" required>
        </div>

        <div class="form-group">
            <label>Date de Retour :</label>
            <input type="date" name="date_retour" class="form-control" value="{{ $detenteur->date_retour }}">
        </div>

        <div class="form-group">
            <label>Observation :</label>
            <textarea name="observation" class="form-control" required>{{ $detenteur->observation }}</textarea>
        </div>

        <button type="submit" class="btn btn-success btn-lg mt-3">✅ Enregistrer</button>
        <a href="{{ route('materiels.index') }}" class="btn btn-secondary btn-lg mt-3">Retour</a>
    </form>
</div>
@endsection
