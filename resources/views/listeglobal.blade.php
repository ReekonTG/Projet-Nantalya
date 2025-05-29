@extends('layout')

@section('title', 'Liste Globale')

@section('content')
<div class="container mt-5">

    <style>
        h2 {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 10px;
            color: #0d6efd;
        }

        .table-container {
            margin-bottom: 60px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
        }

        table th {
            background-color: #0d6efd;
            color: white;
            text-align: center;
        }

        table td {
            text-align: center;
        }
    </style>

    {{-- Matériels Informatiques --}}
    <div class="table-container">
        <h2>Liste Matériels Informatiques</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Numéro Inventaire</th>
                        <th>Désignation</th>
                        <th>Numéro de Série</th>
                        <th>Date Acquisition</th>
                        <th>Mode Paiement</th>
                        <th>BC/BL</th>
                        <th>Bailleurs</th>
                        <th>Nature</th>
                        <th>Situation</th>
                        <th>Utilisateurs</th>
                        <th>Repère</th>
                        <th>Coût Unitaire</th>
                        <th>Coût Total</th>
                        <th>Fournisseurs</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materielsInformatiques as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
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
                            <td>{{ $item->cout_unitaire }}</td>
                            <td>{{ $item->cout_total }}</td>
                            <td>{{ $item->fournisseurs }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Matériels Roulants --}}
    <div class="table-container">
        <h2>Liste Matériels Roulants</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Numéro Inventaire</th>
                        <th>Désignation</th>
                        <th>Numéro de Série</th>
                        <th>Date Acquisition</th>
                        <th>Mode Paiement</th>
                        <th>BC/BL</th>
                        <th>Bailleurs</th>
                        <th>Nature</th>
                        <th>Situation</th>
                        <th>Utilisateurs</th>
                        <th>Repère</th>
                        <th>Coût Unitaire</th>
                        <th>Coût Total</th>
                        <th>Fournisseurs</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materielsRoulants as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
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
                            <td>{{ $item->cout_unitaire }}</td>
                            <td>{{ $item->cout_total }}</td>
                            <td>{{ $item->fournisseurs }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Matériels Généraux --}}
    <div class="table-container">
        <h2>Liste Autres Matériels</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Numéro Inventaire</th>
                        <th>Désignation</th>
                        <th>Numéro de Série</th>
                        <th>Date Acquisition</th>
                        <th>Mode Paiement</th>
                        <th>BC/BL</th>
                        <th>Bailleurs</th>
                        <th>Nature</th>
                        <th>Situation</th>
                        <th>Utilisateurs</th>
                        <th>Repère</th>
                        <th>Coût Unitaire</th>
                        <th>Coût Total</th>
                        <th>Fournisseurs</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materielsGeneraux as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
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
                            <td>{{ $item->cout_unitaire }}</td>
                            <td>{{ $item->cout_total }}</td>
                            <td>{{ $item->fournisseurs }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
