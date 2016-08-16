<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaAreas_typePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_areas_type', function (Blueprint $table) {
            $table->increments('tid');
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->integer('areas_type_id')->unsigned();
            $table->foreign('areas_type_id')->references('id')->on('areas_types')->onDelete('cascade');
            $table->primary(['area_id', 'areas_type_id']);
            $table->string('price');

            //making composite keys
            $table->primary(['area_id','areas_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('area_areas_type');
    }
}
