<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuivimaterielsTable extends Migration
{
    public function up()
    {
        Schema::create('suivimateriels', function (Blueprint $table) {
            $table->id();  // Ajoute une clé primaire 'id'
            $table->date('date_suivi');
            $table->string('nom');
            $table->string('organisme');
            $table->string('contact');
            $table->integer('nombre');
            $table->string('situation');
            $table->string('constation');
            $table->date('date_retour');
            $table->text('observation');
            $table->timestamps();

            // Ajoutez le champ 'materiel_id' avec une clé étrangère
            $table->unsignedBigInteger('materiel_id');
            $table->foreign('materiel_id')->references('id')->on('materiels')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('suivimateriels');
    }
}
