@extends('layout') <!-- Assurez-vous que votre vue hérite d'un layout -->

@section('title', 'Liste du Personnel')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<div class="container">
    <h2 class="my-4">Liste du Personnel</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personnels as $personnel)
                <tr>
                    <td>{{ $personnel->nom }}</td>
                    <td>{{ $personnel->prenom }}</td>
                    <td>
                        <a href="{{ route('personnels.edit', $personnel->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('personnels.destroy', $personnel->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
