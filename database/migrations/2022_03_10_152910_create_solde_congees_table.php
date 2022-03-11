<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use   App\Models\Enum\EStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('solde_congees', function (Blueprint $table) {
            $table->id();

            $table->integer('annee');
            $table->bigInteger('employee_id')->unsigned();

            $table->float('soldeAcquis');
            $table->float('soldeRestant');
            $table->boolean('expire');

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onCascade('delete');

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
        Schema::dropIfExists('solde_congees');
    }
};
