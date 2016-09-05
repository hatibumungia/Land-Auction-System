<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdatePlotPlotAssigmentTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER tr_plot_assignment_rollback BEFORE DELETE ON plot_reservation FOR EACH ROW
            BEGIN
                UPDATE plot_assignment SET plot_assignment.status = 0
                WHERE plot_assignment.area_id = OLD.area_id
                AND plot_assignment.areas_type_id = OLD.areas_type_id
                AND plot_assignment.block_id=OLD.block_id
                AND plot_assignment.plot_id=OLD.plot_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS tr_plot_assignment_rollback');
    }
}
