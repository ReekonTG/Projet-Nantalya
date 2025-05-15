@extends('layout')  <!-- Assurez-vous que votre layout est correctement importé -->

@section('title', 'Inscription Personnel')

@section('content')
    <div class="container mt-4">
        <h2>Inscription Personnel</h2>
        <form action="{{ route('staff.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <button type="submit" class="btn btn-custom">Soumettre</button>
        </form>
    </div>
@endsection
