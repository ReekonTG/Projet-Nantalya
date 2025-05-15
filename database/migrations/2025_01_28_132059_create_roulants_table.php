<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoulantsTable extends Migration
{
    public function up()
    {
        Schema::create('roulants', function (Blueprint $table) {
            $table->id();
            $table->string('numero_inventaire');
            $table->string('designation');
            $table->string('numero_serie')->nullable();
            $table->date('date_acquisition')->nullable();
            $table->string('mode_paiement')->nullable();
            $table->string('bc_bl')->nullable();
            $table->string('bailleurs')->nullable();
            $table->string('nature')->nullable();
            $table->string('situations')->nullable();
            $table->string('utilisateurs')->nullable();
            $table->string('repere')->nullable();
            $table->string('fournisseurs')->nullable();
            $table->decimal('cout_unitaire', 10, 2)->nullable();
            $table->decimal('cout_total', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('roulants');
    }
}
