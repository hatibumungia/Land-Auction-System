<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlotStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plot_status', function (Blueprint $table) {
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('area_id')->on('plot_assignment')->onDelete('cascade');

            $table->integer('areas_type_id')->unsigned();
            $table->foreign('areas_type_id')->references('areas_type_id')->on('plot_assignment')->onDelete('cascade');

            $table->integer('block_id')->unsigned();
            $table->foreign('block_id')->references('block_id')->on('plot_assignment')->onDelete('cascade');

            $table->integer('plot_id')->unsigned();
            $table->foreign('plot_id')->references('plot_id')->on('plot_assignment')->onDelete('cascade');

            $table->double('balance');

            $table->integer('user_detail_id')->unsigned();
            $table->foreign('user_detail_id')->references('user_detail_id')->on('user_details')->onDelete('cascade');

            $table->timestamp('deadline');

            $table->timestamps();

            $table->primary(['area_id','areas_type_id','plot_id','block_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('plot_status');
    }
}
