@extends('layout')

@section('title', 'Inscription Personnel')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<style>
    .fade-in {
        animation: fadeInUp 0.7s ease-out;
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .form-container {
        max-width: 600px;
        margin: auto;
        padding: 2rem;
        background-color: #f8f9fa;
        border-radius: 1rem;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .btn-custom {
        background-color: #007bff;
        color: white;
        transition: background-color 0.3s ease;
    }
    .btn-custom:hover {
        background-color: #0056b3;
    }
    
</style>

<div class="container mt-5 fade-in">
    <div class="form-container">
        <h3 class="text-center mb-4">Inscription du Personnel</h3>

        {{-- Message de succès --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Message d’erreurs de validation --}}
        @if($errors->any())
            <div class="alert alert-danger fade show">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('staff.store1') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
                <div class="invalid-feedback">Veuillez entrer le nom.</div>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
                <div class="invalid-feedback">Veuillez entrer le prénom.</div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-custom px-4">Soumettre</button>
            </div>
        </form>
    </div>
</div>

<script>
// Bootstrap 5 validation
(() => {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', e => {
            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();
</script>
@endsection
