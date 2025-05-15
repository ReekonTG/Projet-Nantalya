@extends('layout')

@section('title', 'Enregistrer un Matériel')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaire</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <style>
    /* Styles pour les en-têtes du tableau */
    table th {
        background-color: #003366; /* Couleur de fond des en-têtes */
        color: #fffff; /* Couleur du texte des en-têtes (blanc) */
    }

    /* Styles pour le survol des lignes du tableau */
    table tr:hover {
        background-color: #f1f1f1; /* Couleur de fond au survol */
    }

    /* Styles pour le tableau */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
</style>
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Inventaire des Matériels</h1>
        <table class="table table-bordered table-striped">
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
                    <th>Situation</th>
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
                        <td>
                            <!-- Bouton pour rediriger vers la vue SituationAnnuel.blade.php -->
<!-- Dans ton bouton -->
<button type="button" class="btn btn-primary" 
    onclick="window.location.href='{{ route('situation.annuelle', ['id' => $item->id, 'type' => $item->type]) }}'">
    Situation
</button>




                @endforeach
            </tbody>
        </table>
    </div>
   

</body>
</html>
@endsection