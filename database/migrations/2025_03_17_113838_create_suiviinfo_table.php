<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuiviinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suiviinfo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('informatique_id');  // Relation avec la table informatique
            $table->date('date');
            $table->string('nom');
            $table->string('organisations');
            $table->string('contact');
            $table->integer('nombre');
            $table->string('situation');
            $table->text('constatation')->nullable();
            $table->date('date_retour')->nullable();
            $table->text('observation')->nullable();
            $table->timestamps();

            // Clé étrangère pour relier à la table 'informatique'
            $table->foreign('informatique_id')->references('id')->on('informatique')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suiviinfo');
    }
}
