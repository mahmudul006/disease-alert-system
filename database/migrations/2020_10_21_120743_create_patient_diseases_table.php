<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_diseases', function (Blueprint $table) {
            $table->id();
            $table->string('prescription')->nullable();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('disease_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('season_id');
            $table->timestamps();

            $table->foreign('patient_id')
                ->references('id')
                ->on('patients')
                ->onDelete('cascade');

            $table->foreign('disease_id')
                ->references('id')
                ->on('diseases')
                ->onDelete('cascade');

            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade');

            $table->foreign('season_id')
                ->references('id')
                ->on('seasons')
                ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_diseases');
    }
}
