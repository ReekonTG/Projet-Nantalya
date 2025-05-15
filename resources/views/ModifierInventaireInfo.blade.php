@extends('layout')

@section('title', 'Modifier l\'Inventaire')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg">
        <div class="card-header text-white text-center" style="background-color: #f39c12;">
            <h2>✏️ Modifier l'Inventaire</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('inventaire.update', $inventaire->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control" value="{{ $inventaire->date }}" required>
                </div>

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" value="{{ $inventaire->nom }}" required>
                </div>

                <div class="form-group">
                    <label for="organisme_poste">Organisme / Poste</label>
                    <input type="text" name="organisme_poste" class="form-control" value="{{ $inventaire->organisme_poste }}">
                </div>

                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" name="contact" class="form-control" value="{{ $inventaire->contact }}">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="number" name="nombre" class="form-control" value="{{ $inventaire->nombre }}" required>
                </div>

                <div class="form-group">
                    <label for="situation">Situation</label>
                    <input type="text" name="situation" class="form-control" value="{{ $inventaire->situation }}">
                </div>

                <div class="form-group">
                    <label for="constatation">Constatation</label>
                    <input type="text" name="constatation" class="form-control" value="{{ $inventaire->constatation }}">
                </div>

                <div class="form-group">
                    <label for="date_retour">Date de Retour</label>
                    <input type="date" name="date_retour" class="form-control" value="{{ $inventaire->date_retour }}">
                </div>

                <div class="form-group">
                    <label for="observation">Observation</label>
                    <textarea name="observation" class="form-control">{{ $inventaire->observation }}</textarea>
                </div>

                <button type="submit" class="btn btn-success btn-lg mt-3">✅ Enregistrer</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-lg mt-3">🔙 Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection
