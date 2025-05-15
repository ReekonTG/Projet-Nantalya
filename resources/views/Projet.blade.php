@extends('layout')

@section('title', 'Liste des Projets')

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-4">Liste des Projets</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Logo</th>
                    <th>Bailleur</th>
                    <th>Date de Début</th>
                    <th>Date de Fin</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projets as $projet)
                    <tr>
                        <td>{{ $projet->id }}</td>
                        <td>{{ $projet->description }}</td>
                        <td>
                            @if($projet->logo)
                                <img src="{{ asset('storage/' . $projet->logo) }}" alt="Logo" width="50">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $projet->bailleur }}</td>
                        <td>{{ $projet->date_debut }}</td>
                        <td>{{ $projet->date_fin }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Aucun projet trouvé</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
