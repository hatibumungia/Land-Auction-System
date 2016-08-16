<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArea_typeBlockAsignmentPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_type_block', function (Blueprint $table) {
            $table->integer('tid')->unsigned();
            $table->foreign('tid')->references('tid')->on('area_areas_type')->onDelete('cascade');
            $table->integer('block_id')->unsigned();
            $table->foreign('block_id')->references('id')->on('blocks')->onDelete('cascade');

            //making composite keys
            $table->primary(['tid','block_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('area_type_block');
    }
}
