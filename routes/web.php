<?php
use App\Http\Controllers\ProjetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\InformatiqueController;
use App\Http\Controllers\RoulantController;
use App\Http\Controllers\HistoriqueMaterielController;
use App\Http\Controllers\InventaireInfoController;
use App\Http\Controllers\DetenteurInfoController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\SuiviMaterielController;
use App\Http\Controllers\InventaireController;
use App\Http\Controllers\SituationAnnuelleController;
use App\Http\Controllers\SituationAnnuelController;
use App\Http\Controllers\SuiviRoulantController;
use App\Http\Controllers\SuiviInfoController;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\ListeGlobalController;
use App\Models\Materiel;
use App\Models\SuiviInfo;
use App\Models\SuiviMateriel;
use App\Models\InventaireInfo;
use App\Models\Roulant;
use App\Models\Personnel;
use App\Models\Informatique;
use App\Models\HistoriqueMateriel;
use App\Models\DetenteurInfo;
use App\Http\Controllers\DetenteurRoulantController;
use App\Exports\InventaireExport;
use Maatwebsite\Excel\Facades\Excel;
Route::get('/', function () {
    return view('Acceuil');
});
Route::get('/Project', function () {
    return view('Projet'); // Affiche la vue 'projects.blade.php'

});
Route::get('/Tiroir', function () {
    return view('Tiroir'); // Affiche la vue 'projects.blade.php'



    
});


Route::get('/informatique', function () {
    return view('Informatique'); // Affiche la vue 'Fournisseurs.blade.php'
});
Route::get('/materiels', function () {
    return view('Materiels'); // Affiche la vue 'Materiels.blade.php'
});


Route::get('/projet', [ProjetController::class, 'index'])->name('projet.index');


// Afficher le formulaire
Route::get('/materiels', [MaterielController::class, 'index'])->name('materiels.index');

// Enregistrer les données soumises
Route::post('/materiels.store', [MaterielController::class, 'store'])->name('materiels.store');



// Route pour afficher la vue 'Liste'
Route::get('/liste', function () {
    return view('Liste');
})->name('liste.view');

// Route pour afficher la liste des matériels avec le contrôleur MaterielController
Route::get('/materiels/liste', [MaterielController::class, 'liste'])->name('materiels.liste');

Route::get('/liste', [MaterielController::class, 'index'])->name('materiels.liste');
Route::get('/materiels/liste', [MaterielController::class, 'liste'])->name('materiels.liste');


Route::get('/tiroir', [MaterielController::class, 'showTiroirForm'])->name('tiroir');

Route::post('/filterData', [MaterielController::class, 'filterData'])->name('filterData');
Route::get('/tiroir', [MaterielController::class, 'showTiroirForm'])->name('Tiroir');



// Route pour afficher le formulaire de modification du matériel
Route::put('/materiels//detenteur/{id}/update', [MaterielController::class, 'updateFin'])->name('detenteur.updatemateriel');
Route::get('/materiels/{id}/fin', [MaterielController::class, 'fin'])->name('materiels.fin');

Route::get('/materiels/{id}/edit', [MaterielController::class, 'edit'])->name('materiels.edit');

Route::get('/materiels/detenteurs/{id}/edit', [MaterielController::class, 'edite'])->name('detenteurs.editFin');




// Route pour mettre à jour le matériel
Route::put('/materiels/{id}', [MaterielController::class, 'update'])->name('materiels.update');

Route::get('/materiels.list', [MaterielController::class, 'indexe'])->name('list.index');


Route::get('/materiels/liste', [MaterielController::class, 'liste'])->name('liste');



Route::get('/materiels/view', [MaterielController::class, 'view'])->name('materiels.view');


Route::get('/materiels/create', [MaterielController::class, 'listePersonnels'])->name('materiels.create');

Route::get('/ListeInfo', function () {
    return view('Liste');
})->name('ListeInfo.view');

Route::post('/materiels', [InformatiqueController::class, 'store'])->name('materiels');


Route::get('/listeInfo', [InformatiqueController::class, 'index'])->name('listeInfo');

//Route::get('/ListeInfo', [InformatiqueController::class, 'index'])->name('ListeInfo');

Route::get('/materiels/{id}/edit', [InformatiqueController::class, 'edit'])->name('materiels.edit');

Route::put('/materiels/{id}', [InformatiqueController::class, 'update'])->name('materiels.update');

// Route pour supprimer un matériel de la table informatique
Route::delete('/informatique/{informatique}', [InformatiqueController::class, 'destroy'])->name('informatique.destroy');

Route::get('/informatique', [InformatiqueController::class, 'index'])->name('informatique.index');
//Route::get('/materiels/{id}', [InformatiqueController::class, 'show'])->name('materiels.show');
Route::get('/informatique/{id}/voir', [InformatiqueController::class, 'show'])->name('informatique.show');
Route::get('/liste-info', [InformatiqueController::class, 'index'])->name('listeInfo.other');
Route::resource('suiviinfo', SuiviInfoController::class);

// Route GET pour afficher les détails du matériel
Route::get('/materiels/{id}', [MaterielController::class, 'show'])->name('materiels.show');

// Route POST pour ajouter des informations supplémentaires
Route::post('/materiels/{id}/ajouter-informations', [MaterielController::class, 'ajouterInformations'])->name('materiels.ajouterInformations');

Route::get('/materiels/{id}/fin', [MaterielController::class, 'fin'])->name('materiels.fin');



Route::get('/roulants', [RoulantController::class, 'create'])->name('roulants.create');
Route::post('/roulants', [RoulantController::class, 'store'])->name('roulants.store');
Route::get('/roulants/list', [RoulantController::class, 'index'])->name('roulants.list');


Route::get('/roulants/{roulant}/edit', [RoulantController::class, 'edit'])->name('roulants.edit');
Route::put('/roulants/{roulant}', [RoulantController::class, 'update'])->name('roulants.update');

Route::delete('/roulants/{roulant}', [RoulantController::class, 'destroy'])->name('roulants.destroy');

Route::get('/roulants/{roulant}', [RoulantController::class, 'show'])->name('roulants.show');



Route::get('/suivi-roulant/{roulant}', [SuiviRoulantController::class, 'show'])->name('suiviRoulant.index');

// Route pour afficher les détenteurs du roulant
Route::get('/roulants/{id}/detenteurs', [DetenteurRoulantController::class, 'index'])->name('roulants.detenteurs');

// Route pour enregistrer les détenteurs du roulant
Route::post('/roulants/{roulant}/detenteurs', [DetenteurRoulantController::class, 'store'])->name('detenteurRoulant.store');

// Route pour ajouter un détenteur avec un autre contexte
Route::post('/detenteurRoulant/{roulant}', [DetenteurRoulantController::class, 'store'])->name('detenteurRoulant.alternateStore');


// Route pour afficher la fiche du roulant et ses détenteurs
Route::get('/roulants/{id}/fiche', [DetenteurRoulantController::class, 'show'])->name('roulants.fiche');


// ✅ Route pour afficher le formulaire d'édition d'un détenteur
//Route::get('/detenteurs/{id}/edit', [DetenteurRoulantController::class, 'edit'])->name('detenteur.edit');

// ✅ Route pour mettre à jour les informations d'un détenteur
Route::put('/detenteurs/{id}', [DetenteurRoulantController::class, 'update'])->name('detenteur.update');



Route::get('/roulants/{id}/fiche', [DetenteurRoulantController::class, 'show'])->name('detenteurRoulant.show');

Route::get('/roulants/{id}/detenteurs', [RoulantController::class, 'showDetenteurs'])->name('roulants.detenteurs');
Route::post('/suivi-roulant/{roulant}', [SuiviRoulantController::class, 'store'])->name('suiviRoulant.store');



// Ajoute cette route
//Route::get('/roulants/inventaire', [RoulantController::class, 'inventaire'])->name('inventaire.roulant');

// Route pour l'inventaire
Route::get('/detenteur/inventaire', [DetenteurRoulantController::class, 'inventaire'])->name('inventaire.roulant');


Route::post('/detenteur/ajouter/{roulantId}', [DetenteurController::class, 'ajouter'])->name('detenteur.ajouter');


Route::post('/inventaire/ajouter/{roulantId}', [DetenteurRoulantController::class, 'ajouter'])->name('inventaire.ajouter');

Route::get('/informatique', function () {
    return view('informatique');
})->name('informatique');



// Route 1 - Ajouter des informations sur un matériel informatique
Route::post('/materiel/{materiel}/informations', [DetenteurInformatiqueController::class, 'store'])->name('informatique.ajouterInformationsMateriel');

// Route 2 - Ajouter des informations sur un autre type d'informatique
Route::post('/informatique/{id}/ajouter-informations', [DetenteurInfoController::class, 'store'])->name('informatique.ajouterInformations');

Route::get('/informatique/{id}/fiche', [DetenteurInfoController::class, 'show'])->name('informatique.fiche1');

Route::get('/informatique/{id}/inventaire', [InventaireInfoController::class, 'show'])->name('informatique.inventaire');
Route::post('/informatique/{id}/inventaire', [InventaireInfoController::class, 'store'])->name('informatique.inventaire.ajouter');

Route::get('/materiel/{materiel_id}/inventaire', [InventaireInfoController::class, 'fiche'])->name('inventaire.fiche');
Route::get('/inventaire/{id}/edit', [InventaireInfoController::class, 'edit'])->name('inventaire.edit');
Route::post('/inventaire/{id}/update', [InventaireInfoController::class, 'update'])->name('inventaire.update.post.id');




Route::get('/inventaire/{materielId}', [InventaireInfoController::class, 'showInventaireFicheInfo'])->name('inventaire.showMateriel');
Route::post('/inventaire/{materielId}/store', [InventaireInfoController::class, 'store'])->name('inventaire.store');
Route::get('/inventaire/{inventaireId}/edit', [InventaireInfoController::class, 'edit'])->name('inventaire.edit.inventaireId');
Route::post('/inventaire/{inventaireId}/update', [InventaireInfoController::class, 'update'])->name('inventaire.update.post.inventaireId');
Route::delete('/inventaire/{inventaireId}/delete', [InventaireInfoController::class, 'destroy'])->name('inventaire.destroyWithDeleteSuffix');
Route::get('/materiel/{materiel_id}/inventaire', [InventaireInfoController::class, 'fiche'])->name('inventaire.fiche');
Route::get('/inventaire/{id}/edit', [InventaireInfoController::class, 'edit'])->name('inventaire.edit.autre1');
Route::put('/inventaire/{id}', [InventaireInfoController::class, 'update'])->name('inventaire.update.put.id');
Route::get('/materiels/liste-info', [InformatiqueController::class, 'listeInfo'])->name('materiels.listeInfo');


Route::get('/detenteur/{id}/edit', [DetenteurInfoController::class, 'edit'])->name('detenteur.edit');
Route::post('/detenteur/{id}/update', [DetenteurInfoController::class, 'update'])->name('detenteur.update');

Route::post('/detenteur-info/{id}', [DetenteurInfoController::class, 'store'])->name('detenteur-info.store');
Route::get('/detenteur-info/{id}', [DetenteurInfoController::class, 'show'])->name('detenteur-info.show');
Route::put('/detenteur-info/{id}', [DetenteurInfoController::class, 'update'])->name('detenteur-info.update');
Route::delete('/detenteur-info/{id}', [DetenteurInfoController::class, 'destroy'])->name('detenteur-info.destroy');


Route::get('/informatique/{informatique_id}/inventaire', [InventaireInfoController::class, 'show'])->name('inventaire.showInformatique');
Route::get('/informatique/{informatique_id}/inventaire/create', [InventaireInfoController::class, 'create'])->name('inventaire.create');
Route::post('/informatique/{informatique_id}/inventaire', [InventaireInfoController::class, 'store'])->name('informatique.inventaire.store');
Route::get('/inventaire/{id}/edit', [InventaireInfoController::class, 'edit']) ->name('inventaire.edit.autre2');
Route::put('/inventaire/{id}', [InventaireInfoController::class, 'update'])->name('inventaire.update.put.id.duplicate');
Route::delete('/inventaire/{id}', [InventaireInfoController::class, 'destroy'])->name('inventaire.destroy');
Route::get('/materiel/{materiel_id}/inventaire', [InventaireInfoController::class, 'fiche'])->name('inventaire.fiche');
Route::get('/inventaire/ficheInfo/{id}', [InventaireInfoController::class, 'ficheInfo'])->name('inventaire.ficheInfo');

Route::get('/informatique/{id}/fiche', [InventaireInfoController::class, 'ficheInfo'])->name('inventaire.ficheInfo');


Route::get('/informatique/{id}/fiche', [InformatiqueController::class, 'fiche'])->name('informatique.fiche2');

// Route pour afficher la fiche du roulant (détail)
//Route::get('/roulants/{id}/voir', [DetenteurRoulantController::class, 'show'])->name('detenteurRoulants.show');



Route::get('/staff', [PersonnelController::class, 'create'])->name('staff.create1');
Route::post('/staff', [PersonnelController::class, 'store'])->name('staff.store1');


Route::get('/staff/create', [PersonnelController::class, 'create'])->name('staff.create2'); // Afficher le formulaire
Route::post('/staff/store', [PersonnelController::class, 'store'])->name('staff.store2'); // Soumettre le formulaire

Route::get('/staff', [PersonnelController::class, 'index'])->name('staff.index');

Route::resource('personnels', PersonnelController::class);
Route::get('personnels/create', [PersonnelController::class, 'create'])->name('personnels.create');

// Route pour afficher le formulaire de création (GET)
Route::get('/suivis/create', [SuiviMaterielController::class, 'create'])->name('suivis.create');

// Route pour enregistrer un nouveau suivi (POST)
Route::post('/suivis', [SuiviMaterielController::class, 'store'])->name('suivis.store');
// Route pour afficher la liste des suivis
Route::get('/suivis', [SuiviMaterielController::class, 'index'])->name('suivis.index');

// Dans routes/web.php
Route::get('/suivis/{id}', [SuiviMaterielController::class, 'show'])->name('suivis.show');

// Ajoutez cette ligne dans vos fichiers de routes (par exemple, `web.php`):
Route::post('/materiels/{id}/suivi', [MaterielController::class, 'storeSuivi'])->name('suivimateriels.store1');
Route::get('/materiels/{materiel}/suivi', [MaterielController::class, 'showSuivi'])->name('suivimateriels.show');

Route::get('/materiels/{materiel}/suivi', [MaterielController::class, 'showSuivi'])
    ->name('suivimateriels.show');

Route::post('/materiels/{materiel}/suivi', [MaterielController::class, 'storeSuivi'])
    ->name('suivimateriels.store2');

 Route::get('/materiels/{materiel}/suivi', [MaterielController::class, 'suivi'])->name('suivi.materiel');
 Route::get('/suivimateriels/{id}/edit', [SuiviMaterielController::class, 'edit'])->name('suivimateriels.edit');

 // Route pour afficher le formulaire d'édition du suivi
Route::get('/suivimateriels/{id}/edit', [MaterielController::class, 'editSuivi'])->name('suivimateriels.edit');

// Route pour mettre à jour un suivi
Route::put('/suivimateriels/{id}', [MaterielController::class, 'updateSuivi'])->name('suivimateriels.update');
// web.php
Route::get('/suivimateriels', [MaterielController::class, 'index'])->name('suivimateriels.index');


Route::get('/materiel/{id}/voirinfo', [InformatiqueController::class, 'show'])->name('informatique.fiche.voir');

Route::get('/inventaire', [InventaireController::class, 'index'])->name('inventaire.index');


Route::get('/situation-annuelle/{id}/{type}', [SituationAnnuelleController::class, 'show'])
->name('situation.annuelle');
Route::post('/situation/store', [SituationAnnuelleController::class, 'store'])->name('situation.store');
//Route::get('/tout-inventaire', [SituationAnnuelleController::class, 'showAllInventaire'])->name('toutInventaire');
Route::get('/tout-inventaire', [SituationAnnuelleController::class, 'toutInventaire'])->name('tout.inventaire');




Route::get('export-inventaire', [InventaireController::class, 'exportInventaire']);
Route::get('/informatique', [InformatiqueController::class, 'listePersonnels'])->name('informatique');
Route::get('/materiels/personnels', [MaterielController::class, 'listePersonnels'])->name('materiels.personnels');
Route::get('/roulants', [RoulantController::class, 'listePersonnels'])->name('roulants.create');
Route::get('/acceuil', [AcceuilController::class, 'index']);
//Route::post('/detenteur/update/{id}', [DetenteurInfoController::class, 'update'])->name('detenteur.update2');


// Route pour afficher le formulaire de modification d'un détenteur
//Route::get('/detenteurs/{id}/edit', [DetenteurRoulantController::class, 'edit'])->name('detenteur.edit');

// Route pour mettre à jour le détenteur
Route::put('/detenteurs/{id}', [DetenteurRoulantController::class, 'update'])->name('detenteur.update3');
Route::post('/detenteur/update/{id}', [DetenteurRoulantController::class, 'update']);

 
Route::get('/EditDetenteurRoulant/{id}', [DetenteurRoulantController::class, 'edit'])->name('EditDetenteurRoulant.edit');
Route::post('/EditDetenteurRoulant/{id}/update', [DetenteurRoulantController::class, 'update'])->name('EditDetenteurRoulant.update');
Route::get('/roulants/detenteur/{id}/edit', [DetenteurRoulantController::class, 'edit'])->name('detenteur.editroulant');

Route::get('/detenteur/{id}/edit', [MaterielController::class, 'edite'])->name('detenteur.edite');
Route::put('/suivimateriels/{id}', [SuiviMaterielController::class, 'update'])->name('suivimateriels.update');

Route::get('/liste-globale', [ListeGlobalController::class, 'index'])->name('liste.globale');
Route::get('/liste-globale/export', [ListeGlobalController::class, 'exportInventaire'])->name('liste.globale.export');

Route::get('/detenteur/{id}/edit', [DetenteurInfoController::class, 'edit'])->name('detenteur.edit');
Route::post('/detenteur/{id}/update', [DetenteurInfoController::class, 'update'])->name('detenteur.update');

Route::get('/materiels/detenteurs/{id}/edit', [MaterielController::class, 'edite'])->name('detenteurs.editFin');
