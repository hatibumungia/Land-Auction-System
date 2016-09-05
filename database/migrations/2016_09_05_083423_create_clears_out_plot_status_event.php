<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClearsOutPlotStatusEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(<<<'addtime'

            CREATE EVENT IF NOT EXISTS e_hourly ON SCHEDULE EVERY 3 MINUTE STARTS CURRENT_TIMESTAMP 
            DO BEGIN
                DELETE FROM plot_reservation WHERE plot_reservation.status = 0 AND
                NOW()>=ADDTIME(plot_reservation.created_at, '0:03:00');
            END
        
addtime
);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP EVENT IF EXISTS e_hourly');
    }
}
