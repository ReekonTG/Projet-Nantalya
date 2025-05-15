@extends('layout')

@section('title', 'Inventaire des Roulants')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<div class="container">
    <h2 class="mt-3">📋 Inventaire des Roulants</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Numéro d'Inventaire</th>
                <th>Désignation</th>
                <th>Numéro de Série</th>
                <th>Nature</th>
                <th>Utilisateurs</th>
                <th>Repère</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($roulants as $roulant)
            <tr id="roulant-{{ $roulant->id }}">
                <td>{{ $roulant->numero_inventaire }}</td>
                <td>{{ $roulant->designation }}</td>
                <td>{{ $roulant->numero_serie }}</td>
                <td>{{ $roulant->nature }}</td>
                <td>{{ $roulant->utilisateurs }}</td>
                <td>{{ $roulant->repere }}</td>
               
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('roulants.list') }}" class="btn btn-primary">Retour à la liste</a>
</div>
@endsection
