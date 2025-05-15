<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('situation_annuelles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materiel_id'); // ID du matériel
            $table->string('materiel_type'); // Type de matériel (informatique, roulant, matériel)
            $table->string('annee'); // Ex: 2024, 2025
            $table->string('localite'); // Localisation
            $table->string('situation'); // Situation annuelle
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('situation_annuelles');
    }
};
