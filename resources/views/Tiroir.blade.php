@extends('layouts.layouts')

@section('contenu')
    <!-- Formulaire de Tiroir -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header text-white" style="background-color: #28a745;">
                        <h3 class="mb-0">Formulaire de Tiroir</h3>
                    </div>

                    <div class="card-body" style="background-color: #f8f9fa;">
                        <form id="filterForm" method="POST" action="{{ route('filterData') }}">
                            @csrf

                            <!-- Champ de saisie pour organisme -->
                            <div class="mb-3 row">
                                <label for="organisme" class="col-md-3 col-form-label text-md-right">Organisme</label>
                                <div class="col-md-7">
                                    <input type="text" id="organisme" name="organisme" class="form-control" placeholder="Saisissez le nom de l'organisme">
                                </div>
                            </div>

                            <!-- Bouton "Voir" -->
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="btn btn-danger btn-block">Voir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table pour afficher les résultats -->
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable">
                <thead class="bg-success text-white">
                    <tr>
                        <th>ID</th>
                        <th>Organisme</th>
                        <th>Observation</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Les données seront insérées ici par JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bouton d'impression -->
    <div class="container text-center mt-4">
        <button class="btn btn-success" onclick="printTable()">Imprimer</button>
    </div>

    <!-- Inclusion de Bootstrap 5 et jQuery -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#filterForm').on('submit', function(e) {
                e.preventDefault(); // Empêcher la soumission du formulaire

                var organisme = $('#organisme').val();

                $.ajax({
                    url: '{{ route("filterData") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        organisme: organisme
                    },
                    dataType: 'json',
                    success: function(response) {
                        var tableBody = $('#tableBody');
                        tableBody.empty(); // Effacer le contenu précédent du tableau

                        response.forEach(function(row) {
                            var newRow = '<tr>' +
                                         '<td>' + row.id + '</td>' +
                                         '<td>' + row.organisme + '</td>' +
                                         '<td>' + row.observation + '</td>' +
                                         '</tr>';
                            tableBody.append(newRow);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Une erreur s\'est produite lors du chargement des données.');
                    }
                });
            });
        });

        function printTable() {
            var printContents = document.getElementById('dataTable').outerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
            window.location.reload();
        }
    </script>
@endsection
