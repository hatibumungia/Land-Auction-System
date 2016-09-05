<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_numbers', function (Blueprint $table) {
            $table->increments('transaction_number_id');
            $table->string('transaction_number');
            $table->integer('user_detail_id')->unsigned();
            $table->foreign('user_detail_id')->references('user_detail_id')->on('user_details')->onDelete('cascade');
            $table->integer('status')->default(0);
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
        Schema::drop('transaction_numbers');
    }
}
