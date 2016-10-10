<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRegistryPrintStatusFieldToPlotReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plot_reservation', function (Blueprint $table) {
            $table->boolean('registry_print_status')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plot_reservation', function (Blueprint $table) {
            $table->dropColumn('registry_print_status');
        });
    }
}
