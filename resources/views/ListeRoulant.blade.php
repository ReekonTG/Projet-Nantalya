@extends('layout')

@section('title', 'Liste des Roulants')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <div class="container mt-5">
        <h2 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; color: #2c3e50;">Liste des Roulants</h2>

        <!-- Bouton Ajouter un nouveau roulant -->
        <a href="{{ route('roulants.create') }}" class="btn btn-primary mb-4 shadow-sm" style="background: linear-gradient(135deg, #6a11cb, #2575fc); border: none;">
            <i class="fas fa-plus"></i> Ajouter un nouveau roulant
        </a>
<!-- Bouton Imprimer -->
<button onclick="window.print()" class="btn btn-success mb-4 shadow-sm" style="background: linear-gradient(135deg, #28a745, #218838); border: none;">
            <i class="fas fa-print"></i> Imprimer
        </button>
        <!-- Zone de recherche -->
        <div class="mb-4">
            <input type="text" id="searchInput" class="form-control shadow-sm" placeholder="Rechercher un roulant..." style="border-radius: 8px;">
        </div>

        <!-- Tableau des roulants -->
        <div class="table-responsive">
            <table class="table table-striped table-hover shadow" id="roulantsTable">
                <thead class="text-white" style="background: linear-gradient(135deg, #2575fc, #6a11cb);">
                    <tr>
                        <th>Numéro d'Inventaire</th>
                        <th>Désignation</th>
                        <th>Numéro de Série</th>
                        <th>Date d'Acquisition</th>
                        <th>Mode de Paiement</th>
                        <th>BC / BL</th>
                        <th>Bailleurs</th>
                        <th>Nature</th>
                        <th>Situations</th>
                        <th>Utilisateurs</th>
                        <th>Repère</th>
                        <th>Fournisseurs</th>
                        <th>Coût Unitaire</th>
                        <th>Coût Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roulants as $roulant)
                        <tr>
                            <td>{{ $roulant->numero_inventaire }}</td>
                            <td>{{ $roulant->designation }}</td>
                            <td>{{ $roulant->numero_serie }}</td>
                            <td>{{ $roulant->date_acquisition }}</td>
                            <td>{{ $roulant->mode_paiement }}</td>
                            <td>{{ $roulant->bc_bl }}</td>
                            <td>{{ $roulant->bailleurs }}</td>
                            <td>{{ $roulant->nature }}</td>
                            <td>{{ $roulant->situations }}</td>
                            <td>{{ $roulant->utilisateurs }}</td>
                            <td>{{ $roulant->repere }}</td>
                            <td>{{ $roulant->fournisseurs }}</td>
                            <td>{{ $roulant->cout_unitaire }}</td>
                            <td>{{ $roulant->cout_unitaire * $roulant->nature }}</td>

                            <td>
                                <!-- Bouton Voir -->
                                <a href="{{ route('roulants.show', $roulant->id) }}" class="btn btn-info btn-sm me-1" title="Voir" style="transition: all 0.3s;">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Bouton Modifier -->
                                <a href="{{ route('roulants.edit', $roulant->id) }}" class="btn btn-warning btn-sm me-1" title="Modifier" style="transition: all 0.3s;">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Bouton Supprimer avec confirmation -->
                                <form action="{{ route('roulants.destroy', $roulant->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce roulant ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" style="transition: all 0.3s;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Ajout de FontAwesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Ajout de Google Fonts pour une typographie moderne -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Styles personnalisés -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .btn {
            transition: all 0.3s;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .table-hover tbody tr:hover {
            background-color: rgba(37, 117, 252, 0.1);
        }
        #searchInput {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 10px;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            display: block;
        }
    </style>

    <!-- Script pour la recherche -->
    <script>
        document.getElementById('searchInput').addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase(); // Récupère la valeur de recherche en minuscules
            const rows = document.querySelectorAll('#roulantsTable tbody tr'); // Sélectionne toutes les lignes du tableau

            rows.forEach(row => {
                const rowText = row.textContent.toLowerCase(); // Récupère le texte de la ligne en minuscules
                if (rowText.includes(searchTerm)) {
                    row.style.display = ''; // Affiche la ligne si elle correspond à la recherche
                } else {
                    row.style.display = 'none'; // Masque la ligne si elle ne correspond pas
                }
            });
        });
    </script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
@endsection