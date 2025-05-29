@extends('layout')

@section('title', 'Liste du Personnel')

@section('content')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<style>
    /* Animation sur la ligne quand on clique sur Modifier */
.highlight {
  animation: highlightFade 1.5s forwards;
}

@keyframes highlightFade {
  0% { background-color: #fff3cd; }  /* jaune clair */
  100% { background-color: transparent; }
}

/* Animation fade-in pour les inputs */
.fade-in {
  animation: fadeIn 0.5s ease forwards;
  opacity: 0;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

</style>

<div class="container mt-5">
    <div class="card shadow-lg rounded-4">
        <div class="card-header bg-primary text-white text-center rounded-top-4">
            <h4 class="mb-0">Liste du Personnel</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($personnels as $personnel)
                            <tr id="row-{{ $personnel->id }}">
                                <td>
                                    <span id="nom-{{ $personnel->id }}">{{ $personnel->nom }}</span>
                                    <input type="text" id="input-nom-{{ $personnel->id }}" class="form-control d-none" value="{{ $personnel->nom }}">
                                </td>
                                <td>
                                    <span id="prenom-{{ $personnel->id }}">{{ $personnel->prenom }}</span>
                                    <input type="text" id="input-prenom-{{ $personnel->id }}" class="form-control d-none" value="{{ $personnel->prenom }}">
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                                        <button class="btn btn-warning btn-sm" id="edit-btn-{{ $personnel->id }}" onclick="toggleEdit({{ $personnel->id }})">Modifier</button>
                                        <button class="btn btn-success btn-sm d-none" id="update-btn-{{ $personnel->id }}" onclick="updatePersonnel({{ $personnel->id }})">Mettre à jour</button>
                                        
                                        <form action="{{ route('personnels.destroy', $personnel->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- end table-responsive -->
        </div>
    </div>
</div>

<!-- Script JavaScript -->
<script>
    function toggleEdit(id) {
        document.getElementById('nom-' + id).classList.toggle('d-none');
        document.getElementById('prenom-' + id).classList.toggle('d-none');
        document.getElementById('input-nom-' + id).classList.toggle('d-none');
        document.getElementById('input-prenom-' + id).classList.toggle('d-none');
        document.getElementById('edit-btn-' + id).classList.toggle('d-none');
        document.getElementById('update-btn-' + id).classList.toggle('d-none');
    }

    function updatePersonnel(id) {
        const nom = document.getElementById('input-nom-' + id).value;
        const prenom = document.getElementById('input-prenom-' + id).value;

        fetch(`/personnels/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ nom, prenom })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                location.reload();
            } else {
                alert("Erreur lors de la mise à jour");
            }
        });
    }
</script>
@endsection
