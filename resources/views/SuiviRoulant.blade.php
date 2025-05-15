@extends('layout')

@section('title', 'Suivi du Roulant')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <div class="container">
        <h2>Détails du Roulant</h2>

        <table class="table table-bordered">
            <thead>
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
                </tr>
            </thead>
            <tbody>
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
                    <td>{{ $roulant->cout_total }}</td>
                </tr>
            </tbody>
        </table>

        <h3>Suivi du Roulant</h3>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Nom</th>
                    <th>Organisme</th>
                    <th>Contact</th>
                    <th>Nombre</th>
                    <th>Situation</th>
                    <th>Constation</th>
                    <th>Date de Retour</th>
                    <th>Observation</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suivis as $suivi)
                    <tr>
                        <td>{{ $suivi->date_suivi }}</td>
                        <td>{{ $suivi->nom }}</td>
                        <td>{{ $suivi->organisme }}</td>
                        <td>{{ $suivi->contact }}</td>
                        <td>{{ $suivi->nombre }}</td>
                        <td>{{ $suivi->situation }}</td>
                        <td>{{ $suivi->constation }}</td>
                        <td>{{ $suivi->date_retour }}</td>
                        <td>{{ $suivi->observation }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('roulants.list') }}" class="btn btn-primary mt-3">Retour à la liste</a>
    </div>
    
@endsection
