<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('inventaire_roulants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('roulant_id');  // Clé étrangère vers la table roulants
            $table->integer('annee');                  // Stocke l'année
            $table->string('situation');               // Stocke la situation
            $table->timestamps();

            // Relation avec roulants
            $table->foreign('roulant_id')->references('id')->on('roulants')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inventaire_roulants');
    }
};
