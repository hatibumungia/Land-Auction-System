<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockPlotAssignmentPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plot_assignment', function (Blueprint $table) {
            $table->integer('tid')->unsigned()->index();
            $table->foreign('tid')->references('tid')->on('area_type_block')->onDelete('cascade');

            $table->integer('block_id')->unsigned()->index();
            $table->foreign('block_id')->references('block_id')->on('area_type_block')->onDelete('cascade');

            $table->integer('plot_id')->unsigned()->index();
            $table->foreign('plot_id')->references('id')->on('plots')->onDelete('cascade');

            $table->primary(['tid','block_id', 'plot_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('block_plot');
    }
}
