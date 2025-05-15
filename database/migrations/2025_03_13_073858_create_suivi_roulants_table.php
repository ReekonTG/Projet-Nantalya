<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('suivi_roulants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('roulant_id')->constrained()->onDelete('cascade');
            $table->date('date_suivi');
            $table->string('nom');
            $table->string('organisme');
            $table->string('contact');
            $table->integer('nombre');
            $table->string('situation');
            $table->string('constation');
            $table->date('date_retour')->nullable();
            $table->text('observation');
            $table->timestamps();
        });
    }
} ;