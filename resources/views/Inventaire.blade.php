@extends('layout')

@section('title', 'Enregistrer un Matériel')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary fw-bold">Inventaire des Matériels</h1>

    {{-- Filtres et recherche --}}
        <form method="GET" action="{{ url()->current() }}" class="mb-3 row g-2 justify-content-end align-items-center">
            <div class="col-auto">
                <label for="type" class="fw-bold">Filtrer par Type:</label>
                <select name="type" id="type" class="form-select" onchange="this.form.submit()">
                    <option value=""></option>
                    <option value="Informatique" {{ request('type') == 'Informatique' ? 'selected' : '' }}>Informatique</option>
                    <option value="Roulant" {{ request('type') == 'Roulant' ? 'selected' : '' }}>Roulant</option>
                    <option value="Materiel" {{ request('type') == 'Materiel' ? 'selected' : '' }}>Matériel</option>
                </select>
            </div>
            <div class="col-auto">
                <label for="search" class="fw-bold">N° Inventaire:</label>
                <input type="text" name="search" id="search" value="{{ request('search') }}" class="form-control" placeholder="Ex: INV-00123">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>
        </form>

        <div class="table-responsive mb-3 shadow-sm rounded" style="max-height: 500px; overflow-y: auto;">
    <table class="table table-bordered table-striped align-middle mb-0" style="min-width: 2000px;">
        <thead class="text-white" style="background-color: #003366;">
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
                <th>Situation</th>
                <th>Utilisateurs</th>
                <th>Repère</th>
                <th>Coût Unitaire</th>
                <th>Coût Total</th>
                <th>Fournisseurs</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventaire as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->numero_inventaire }}</td>
                    <td>{{ $item->designation }}</td>
                    <td>{{ $item->numero_serie }}</td>
                    <td>{{ $item->date_acquisition }}</td>
                    <td>{{ $item->mode_paiement }}</td>
                    <td>{{ $item->bc_bl }}</td>
                    <td>{{ $item->bailleurs }}</td>
                    <td>{{ $item->nature }}</td>
                    <td>{{ $item->situations }}</td>
                    <td>{{ $item->utilisateurs }}</td>
                    <td>{{ $item->repere }}</td>
                    <td>{{ number_format($item->cout_unitaire, 0, ',', ' ') }} F</td>
                    <td>{{ number_format($item->cout_total, 0, ',', ' ') }} F</td>
                    <td>{{ $item->fournisseurs }}</td>
                    <td class="text-center">
                        <a href="{{ route('situation.annuelle', ['id' => $item->id, 'type' => $item->type]) }}" class="btn btn-outline-primary btn-sm">
                            Situation
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $inventaire->links() }}
    </div>
</div>

{{-- Style personnalisé --}}
<style>
.pagination {
    font-size: 1.875rem; /* Réduction de taille */
}

.pagination .page-item .page-link {
    padding: 6px 12px;
    margin: 0 2px;
    border-radius: 4px;
    color: #003366;
}

.pagination .page-item.active .page-link {
    background-color: #003366;
    border-color: #003366;
    color: white;
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('search');
        const form = searchInput.closest('form');

        searchInput.addEventListener('input', function () {
            if (this.value === '') {
                // Soumet automatiquement le formulaire si la recherche est effacée
                form.submit();
            }
        });
    });
</script>


@endsection
