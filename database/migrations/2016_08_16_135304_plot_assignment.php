<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlotAssignment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plot_assignment', function (Blueprint $table) {

            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('area_id')->on('block_assignment')->onDelete('cascade');

            $table->integer('areas_type_id')->unsigned();
            $table->foreign('areas_type_id')->references('areas_type_id')->on('block_assignment')->onDelete('cascade');

            $table->integer('block_id')->unsigned();
            $table->foreign('block_id')->references('block_id')->on('block_assignment')->onDelete('cascade');

            $table->integer('plot_id')->unsigned();
            $table->foreign('plot_id')->references('plot_id')->on('plots')->onDelete('cascade');

            $table->double('size');

            $table->tinyInteger('status')->unsigned()->default(0);

            //making composite keys
            $table->primary(['area_id', 'areas_type_id', 'plot_id', 'block_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('plot_assignment');
    }
}
