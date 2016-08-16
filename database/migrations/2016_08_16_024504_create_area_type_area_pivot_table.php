<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArea_typeAreaPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_type_area', function (Blueprint $table) {
            $table->integer('area_type_id')->unsigned()->index();
            $table->foreign('area_type_id')->references('id')->on('area_types')->onDelete('cascade');
            $table->integer('area_id')->unsigned()->index();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->primary(['area_type_id', 'area_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('area_type_area');
    }
}
