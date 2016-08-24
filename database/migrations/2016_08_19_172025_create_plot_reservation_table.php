<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlotReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plot_reservation', function (Blueprint $table) {
            $table->integer('plot_assignment_id')->unsigned();
            $table->foreign('plot_assignment_id')->references('plot_assignment_id')->on('plot_assignment')->onDelete('cascade');
            
            $table->integer('user_detail_id')->unsigned();
            $table->foreign('user_detail_id')->references('user_detail_id')->on('user_details')->onDelete('cascade');
            
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
        Schema::drop('plot_reservation');
    }
}
