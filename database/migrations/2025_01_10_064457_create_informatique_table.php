<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventaireInfosTable extends Migration
{
    public function up()
    {
        Schema::create('inventaire_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('informatique_id');  // Définir comme unsignedBigInteger
            $table->foreign('informatique_id')->references('id')->on('informatique')->onDelete('cascade');
            $table->date('date');
            $table->string('nom')->nullable();
            $table->string('organisations')->nullable();
            $table->string('contact')->nullable();
            $table->integer('nombre')->default(1);
            $table->string('situation')->nullable();
            $table->text('constatation')->nullable();
            $table->date('date_retour')->nullable();
            $table->text('observation')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inventaire_infos');
    }
}
