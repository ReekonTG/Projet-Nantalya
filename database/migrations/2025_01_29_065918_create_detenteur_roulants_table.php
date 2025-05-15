<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('detenteurRoulant', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roulant_id')->constrained('roulants')->onDelete('cascade');
            $table->date('date');
            $table->string('nom');
            $table->string('organisations');
            $table->string('contact');
            $table->integer('nombre');
            $table->string('situation');
            $table->date('date_retour')->nullable();
            $table->text('observation');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('detenteurRoulant');
    }
};


