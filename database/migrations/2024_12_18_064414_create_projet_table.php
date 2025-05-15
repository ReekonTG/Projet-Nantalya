<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id(); // Colonne "No" : clé primaire auto-incrémentée
            $table->string('description')->nullable(); // Description du projet
            $table->string('logo')->nullable(); // Chemin vers le logo
            $table->string('bailleur')->nullable(); // Nom du bailleur
            $table->date('date_debut')->nullable(); // Date de début
            $table->date('date_fin')->nullable(); // Date de fin
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
}
