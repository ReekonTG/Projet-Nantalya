@extends('layout')

@section('title', 'Tableau des Matériels')

@section('content')
<div class="container py-3">
    <!-- Bouton Retour -->
    <div class="mb-3">
        <a href="{{ route('ListeInfo') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
    </div>

    <!-- Tableau simplifié des matériels -->
    <div id="printTable">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Numéro d'Inventaire</th>
                    <th>Désignation</th>
                    <th>Numéro de Série</th>
                    <th>Motifs</th>
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
                @foreach($materiels as $materiel)
                    <tr>
                        <td>{{ $materiel->numero_inventaire }}</td>
                        <td>{{ $materiel->designation }}</td>
                        <td>{{ $materiel->numero_serie }}</td>
                        <td>{{ $materiel->motifs }}</td>
                        <td>{{ $materiel->date_acquisition }}</td>
                        <td>{{ $materiel->mode_paiement }}</td>
                        <td>{{ $materiel->bc_bl }}</td>
                        <td>{{ $materiel->bailleurs }}</td>
                        <td>{{ $materiel->nature }}</td>
                        <td>{{ $materiel->situations }}</td>
                        <td>{{ $materiel->utilisateurs }}</td>
                        <td>{{ $materiel->repere }}</td>
                        <td>{{ $materiel->fournisseurs }}</td>
                        <td>{{ $materiel->cout_unitaire }} Ar</td>
                        <td>{{ $materiel->cout_total }} Ar</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bouton Imprimer -->
    <div class="text-center mt-4">
        <button class="btn btn-primary" onclick="printSpecificTable()">Imprimer le Tableau</button>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function printSpecificTable() {
        var content = document.getElementById('printTable').outerHTML;
        var printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Impression du Tableau</title>');
        printWindow.document.write('<style>');
        printWindow.document.write('table { width: 100%; border-collapse: collapse; }');
        printWindow.document.write('th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }');
        printWindow.document.write('th { background-color: #f4f4f4; }');
        printWindow.document.write('</style></head><body>');
        printWindow.document.write(content);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>
@endsection
