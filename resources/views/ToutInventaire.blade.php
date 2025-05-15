@extends('layout')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container mt-5">
    <h1 class="mb-4">Inventaire des Matériels</h1>

    <!-- Barre de recherche et bouton imprimer -->
    <div class="d-flex justify-content-between mb-3">
        <input type="text" id="searchInput" class="form-control w-25" placeholder="Rechercher...">
        <button onclick="imprimerTableau()" class="btn btn-secondary">🖨️ Imprimer</button>
    </div>
   
    <!-- Options pour masquer les colonnes -->
    <div class="mb-3">
        <label><input type="checkbox" class="toggle-column" data-column="1" checked> Type</label>
        <label><input type="checkbox" class="toggle-column" data-column="2" checked> Numéro d'Inventaire</label>
        <label><input type="checkbox" class="toggle-column" data-column="3" checked> Désignation</label>
        <label><input type="checkbox" class="toggle-column" data-column="10" checked> Localité</label>
        @foreach($annees as $index => $annee)
            <label><input type="checkbox" class="toggle-column" data-column="{{ 11 + $index }}" checked> Situation {{ $annee }}</label>
        @endforeach
    </div>

    <table class="table table-bordered table-striped" id="inventaireTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Numéro d'Inventaire</th>
                <th>Désignation</th>
                <th>Numéro de Série</th>
                <th>Date d'Acquisition</th>
                <th>Mode de Paiement</th>
                <th>BC/BL</th>
                <th>Bailleurs</th>
                <th>Nature</th>
                <th>Localité</th>
                @foreach($annees as $annee)
                    <th>Situation de l'année {{ $annee }}</th>
                @endforeach
                <th>Utilisateurs</th>
                <th>Repère</th>
                <th>Coût Unitaire</th>
                <th>Coût Total</th>
                <th>Fournisseurs</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventaire as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->numero_inventaire ?? 'N/A' }}</td>
                    <td>{{ $item->designation ?? 'N/A' }}</td>
                    <td>{{ $item->numero_serie ?? 'N/A' }}</td>
                    <td>{{ $item->date_acquisition ?? 'N/A' }}</td>
                    <td>{{ $item->mode_paiement ?? 'N/A' }}</td>
                    <td>{{ $item->bc_bl ?? 'N/A' }}</td>
                    <td>{{ $item->bailleurs ?? 'N/A' }}</td>
                    <td>{{ $item->nature ?? 'N/A' }}</td>
                    <td>{{ optional($item->situations->last())->localite ?? 'N/A' }}</td>
                    @foreach($annees as $annee)
                        <td>{{ $item->situations[$annee]->situation ?? 'N/A' }}</td>
                    @endforeach
                    <td>{{ $item->utilisateurs ?? 'N/A' }}</td>
                    <td>{{ $item->repere ?? 'N/A' }}</td>
                    <td>{{ $item->cout_unitaire ?? 'N/A' }}</td>
                    <td>{{ $item->cout_total ?? 'N/A' }}</td>
                    <td>{{ $item->fournisseurs ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- CSS pour masquer les colonnes lors de l'impression -->
<style>
    @media print {
        .hidden-column {
            display: none;
        }
    }
</style>

<!-- Scripts -->
<script>
    // Fonction pour imprimer la table
    function imprimerTableau() {
        window.print();
    }

    // Fonction de recherche dans le tableau
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let input = this.value.toLowerCase();
        let rows = document.querySelectorAll("#inventaireTable tbody tr");

        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(input) ? "" : "none";
        });
    });

    // Fonction pour masquer/afficher les colonnes sélectionnées
    document.querySelectorAll(".toggle-column").forEach(checkbox => {
        checkbox.addEventListener("change", function() {
            let columnIndex = this.getAttribute("data-column");
            let isChecked = this.checked;
            document.querySelectorAll(`#inventaireTable th:nth-child(${columnIndex}), 
                                       #inventaireTable td:nth-child(${columnIndex})`).forEach(cell => {
                if (isChecked) {
                    cell.classList.remove("hidden-column");
                } else {
                    cell.classList.add("hidden-column");
                }
            });
        });
    });
</script>
@endsection
