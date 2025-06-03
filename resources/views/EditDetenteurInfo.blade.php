@extends('layout')

@section('title', 'Modifier Détenteur')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h4>Modifier les Informations du Détenteur</h4>
        </div>

        <div class="card-body">
            {{-- Affichage des erreurs de validation --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <h6>Veuillez corriger les erreurs suivantes :</h6>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('detenteur.update', $detenteur->id) }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Date :</label>
                        <input type="date" name="date" class="form-control" value="{{ $detenteur->date }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nom :</label>
                        <input type="text" name="nom" class="form-control" value="{{ $detenteur->nom }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Organisations :</label>
                        <input type="text" name="organisations" class="form-control" value="{{ $detenteur->organisations }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Contact :</label>
                        <input type="text" name="contact" class="form-control" value="{{ $detenteur->contact }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Nombre :</label>
                        <input type="number" name="nombre" class="form-control" value="{{ $detenteur->nombre }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Situation :</label>
                        <input type="text" name="situation" class="form-control" value="{{ $detenteur->situation }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Date de Retour :</label>
                        <input type="date" name="date_retour" class="form-control" value="{{ $detenteur->date_retour }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Observation :</label>
                    <textarea name="observation" class="form-control" rows="2">{{ $detenteur->observation }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{route('detenteur-info.show', $detenteur->info_id) }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Annuler
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
