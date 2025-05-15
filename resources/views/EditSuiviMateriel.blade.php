@extends('layout')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container">
    <h4 class="text-center text-secondary">Modifier le Suivi du Matériel</h4>

    <form action="{{ route('suivimateriels.update', $suivi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="date_suivi">Date de Suivi</label>
            <input type="date" name="date_suivi" id="date_suivi" class="form-control" value="{{ old('date_suivi', $suivi->date_suivi) }}" required>
        </div>

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $suivi->nom) }}" required>
        </div>

        <div class="form-group">
            <label for="organisme">Organisme</label>
            <input type="text" name="organisme" id="organisme" class="form-control" value="{{ old('organisme', $suivi->organisme) }}" required>
        </div>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" name="contact" id="contact" class="form-control" value="{{ old('contact', $suivi->contact) }}" required>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="number" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $suivi->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="situation">Situation</label>
            <input type="text" name="situation" id="situation" class="form-control" value="{{ old('situation', $suivi->situation) }}" required>
        </div>

        <div class="form-group">
            <label for="constation">Constation</label>
            <input type="text" name="constation" id="constation" class="form-control" value="{{ old('constation', $suivi->constation) }}" required>
        </div>

        <div class="form-group">
            <label for="date_retour">Date de Retour (facultatif)</label>
            <input type="date" name="date_retour" id="date_retour" class="form-control" value="{{ old('date_retour', $suivi->date_retour) }}">
        </div>

        <div class="form-group">
            <label for="observation">Observation</label>
            <textarea name="observation" id="observation" rows="4" class="form-control" required>{{ old('observation', $suivi->observation) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success btn-block mt-4">Mettre à jour le Suivi</button>
    </form>
</div>
@endsection
