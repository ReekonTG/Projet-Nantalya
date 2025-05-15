@extends('layout')

@section('title', 'Modifier Détenteur')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container">
    <h2 class="text-center mb-4">Modifier le Détenteur</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('EditDetenteurRoulant.update', $detenteur->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Date :</label>
            <input type="date" name="date" class="form-control" value="{{ $detenteur->date }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nom :</label>
            <input type="text" name="nom" class="form-control" value="{{ $detenteur->nom }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Organisations :</label>
            <input type="text" name="organisations" class="form-control" value="{{ $detenteur->organisations }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Contact :</label>
            <input type="text" name="contact" class="form-control" value="{{ $detenteur->contact }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre :</label>
            <input type="number" name="nombre" class="form-control" value="{{ $detenteur->nombre }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Situation :</label>
            <input type="text" name="situation" class="form-control" value="{{ $detenteur->situation }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Date de Retour :</label>
            <input type="date" name="date_retour" class="form-control" value="{{ $detenteur->date_retour }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Observation :</label>
            <input type="text" name="observation" class="form-control" value="{{ $detenteur->observation }}">
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('roulants.list') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
