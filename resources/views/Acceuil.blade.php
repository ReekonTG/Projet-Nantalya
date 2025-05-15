@extends('layout')

@section('title', 'Matériel')

@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px); /* Légère élévation au survol */
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1); /* Ombre plus marquée */
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-body {
            padding: 1.5rem;
        }

        .btn {
            margin-top: 10px;
        }

        /* Couleurs personnalisées pour les cartes */
        .card-projets {
            background-color: #f0f8ff;
        }
        .card-fournisseurs {
            background-color: #e0ffe0;
        }
        .card-materiels {
            background-color: #fff5e6;
        }
        .card-rapports {
            background-color: #e6f2ff;
        }
        .card-parametres {
            background-color: #f9e6ff;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Tableau de Bord</h2>
        <div class="row">
            <!-- Projets -->
            <div class="col-md-4 mb-4">
                <div class="card card-projets shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Projets</h5>
                        <p class="card-text">Accédez à vos projets en cours et gérez-les facilement.</p>
                        <a href="#" class="btn btn-primary btn-sm">Voir plus</a>
                    </div>
                </div>
            </div>

            <!-- Fournisseurs -->
            <div class="col-md-4 mb-4">
                <div class="card card-fournisseurs shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                        <h5 class="card-title text-success">Fournisseurs</h5>
                        <p class="card-text">Découvrez et gérez vos fournisseurs de manière fluide.</p>
                        <a href="#" class="btn btn-success btn-sm">Voir plus</a>
                    </div>
                </div>
            </div>

            <!-- Matériels -->
            <div class="col-md-4 mb-4">
                <div class="card card-materiels shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                        <h5 class="card-title text-warning">Matériels</h5>
                        <p class="card-text">Explorez les matériels disponibles et gérez-les efficacement.</p>
                        <a href="#" class="btn btn-warning btn-sm">Voir plus</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Rapports -->
            <div class="col-md-6 mb-4">
                <div class="card card-rapports shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                        <h5 class="card-title text-info">Rapports</h5>
                        <p class="card-text">Consultez les rapports générés pour avoir un aperçu des performances.</p>
                        <a href="#" class="btn btn-info btn-sm">Voir plus</a>
                    </div>
                </div>
            </div>

           
        </div>
    </div>

    <!-- Inclure Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
@endsection