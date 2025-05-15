<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('materiels', function (Blueprint $table) {
            $table->id(); // Clé primaire
            $table->string('numero_inventaire')->unique(); // Numéro d'inventaire
            $table->string('designation'); // Désignation
            $table->string('numero_serie')->nullable(); // Numéro de série
            $table->string('motifs')->nullable(); // Motifs
            $table->date('date_acquisition')->nullable(); // Date d'acquisition
            $table->string('mode_paiement')->nullable(); // Mode de paiement
            $table->string('bc_bl')->nullable(); // Bon de commande ou bon de livraison
            $table->string('bailleurs')->nullable(); // Bailleur
            $table->integer('nature')->default(1); // Nombre de matériels (quantité)
            $table->string('situations')->nullable(); // Situation
            $table->string('utilisateurs')->nullable(); // Utilisateurs
            $table->string('repere')->nullable(); // Repère
            $table->decimal('cout_unitaire', 15, 2)->nullable(); // Coût unitaire
            $table->decimal('cout_total', 15, 2)->nullable(); // Coût total
            $table->string('fournisseurs')->nullable(); // Fournisseurs
            $table->timestamps(); // Dates created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiels');
    }
}
