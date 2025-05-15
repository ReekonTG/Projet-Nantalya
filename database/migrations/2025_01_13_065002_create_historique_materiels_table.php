<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriqueMaterielsTable extends Migration
{
    public function up()
    {
        Schema::create('historique_materiels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materiel_id'); // Lien vers la table des matériels
            $table->date('date'); // Date d'enregistrement de l'historique
            $table->string('nom'); // Nom du détenteur
            $table->string('organisme')->nullable(); // Organisme ou département
            $table->string('contact')->nullable(); // Contact (e-mail ou téléphone)
            $table->integer('nombre')->default(1); // Quantité
            $table->string('situation')->nullable(); // Situation du matériel
            $table->text('observation')->nullable(); // Observation ou remarque
            $table->date('date_retour')->nullable(); // Date de retour du matériel
            $table->text('observation_retour')->nullable(); // Observation au retour
            $table->timestamps(); // Colonnes created_at et updated_at

            // Clé étrangère vers la table 'materiels'
            $table->foreign('materiel_id')->references('id')->on('materiels')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('historique_materiels');
    }
}

