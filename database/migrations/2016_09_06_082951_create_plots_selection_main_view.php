<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlotsSelectionMainView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
        CREATE VIEW plots_selection_main_view AS(
        
        SELECT
            areas.area_id AS areaid, 
            areas.name AS areaname, 
            area_types.areas_type_id AS areatypeid, 
            area_types.name AS areatypename, 
            blocks.block_id AS blockid, 
            blocks.name AS blockname,  
            plots.plot_id AS plotid, 
            plots.plot_no AS plotno, 
            plot_assignment.size AS size, 
            plot_assignment.status AS status,
            block_assignment.file_name AS filename 
            FROM 
            areas, area_assignment, area_types, blocks, block_assignment, plots, plot_assignment WHERE 
            areas.area_id = area_assignment.area_id AND 
            area_types.areas_type_id = area_assignment.areas_type_id AND 
            blocks.block_id = block_assignment.block_id AND 
            area_assignment.area_id = block_assignment.area_id AND 
            area_assignment.areas_type_id = block_assignment.areas_type_id AND 
            plots.plot_id = plot_assignment.plot_id AND 
            block_assignment.area_id = plot_assignment.area_id AND 
            block_assignment.areas_type_id = plot_assignment.areas_type_id AND 
            block_assignment.block_id = plot_assignment.block_id AND 
            plot_assignment.status = 0 
        
        )
            
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW plots_selection_main_view');
    }
}
