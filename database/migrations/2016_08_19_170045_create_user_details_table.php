<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('user_detail_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('email_address')->unique();
            $table->string('phone_number');
            $table->string('district')->nullable();
            $table->string('region')->nullable();
            $table->string('ward')->nullable();
            $table->string('house_number')->nullable();
            $table->string('address')->nullable();
            $table->string('photo')->nullable();
            $table->integer('registration_status')->default(0);
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
        Schema::drop('user_details');
    }
}
