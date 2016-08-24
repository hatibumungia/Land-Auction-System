<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlockAssignment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_assignment', function (Blueprint $table) {
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('area_id')->on('area_assignment')->onDelete('cascade');
            $table->integer('areas_type_id')->unsigned();
            $table->foreign('areas_type_id')->references('areas_type_id')->on('area_assignment')->onDelete('cascade');

            $table->integer('block_id')->unsigned();
            $table->text('file_name')->nullable();
            $table->foreign('block_id')->references('block_id')->on('blocks')->onDelete('cascade');

            //making composite keys
            $table->primary(['area_id','areas_type_id','block_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('block_assignment');
    }
}
