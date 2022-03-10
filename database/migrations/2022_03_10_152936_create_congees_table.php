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
        Schema::create('congees', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('employee_id')->unsigned();

            $table->date('dateSortie');
            $table->integer('dureeEnJour');

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
        Schema::dropIfExists('congees');
    }
};
