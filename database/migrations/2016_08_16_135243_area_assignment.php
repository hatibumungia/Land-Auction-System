<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AreaAssignment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_assignment', function (Blueprint $table) {
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('area_id')->on('areas')->onDelete('cascade');
            
            $table->integer('areas_type_id')->unsigned();
            $table->foreign('areas_type_id')->references('areas_type_id')->on('area_types')->onDelete('cascade');

            $table->string('price');

            $table->primary(['area_id', 'areas_type_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('area_assignment');
    }
}
