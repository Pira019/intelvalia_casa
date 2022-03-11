<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('nom',255);
            $table->string('prenom',255);

            $table->integer('statut');
            $table->integer('contrat');

            $table->integer('dureeContratEnsemaine')->nullable();
            $table->integer('age');
            $table->date('date_embauche');
            $table->integer('period_essai')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
