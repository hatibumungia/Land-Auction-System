<?php

namespace App\Http\Controllers\Admin;

use App\AreaType;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AjaxController extends Controller
{
    public function locationAssignmentsGetLandUse()
    {
        $area_id = $_GET['area_id'];

        $land_uses = DB::select("SELECT area_types.areas_type_id, area_types.name FROM area_types WHERE area_types.areas_type_id NOT IN (SELECT area_assignment.areas_type_id FROM area_assignment WHERE area_assignment.area_id=$area_id)");

        return json_encode($land_uses);
    }
    public function GetLandUse()
    {
        $area_id = $_GET['area_id'];

        $land_uses = DB::select("SELECT plot_assignment.plot_id,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id, areas.name AS location, area_types.name
        as land_use, blocks.name as block, plot_assignment.size, plots.plot_no, plot_assignment.published as published, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id and plot_assignment.area_id='$area_id' AND plot_assignment.published=false ORDER BY plot_assignment.updated_at DESC");

        return json_encode($land_uses);
    }
    public function trial()
    {
       //$reserved_id = $_GET['reserved_id'];
       $land_uses = DB::select("select `dodoma`.`plots`.`plot_no` AS `plot_no`,`dodoma`.`blocks`.`name` AS `block`,`dodoma`.`areas`.`name` AS `location`,`dodoma`.`area_types`.`name` AS `land_use`,`dodoma`.`plot_assignment`.`size` AS `size`,`dodoma`.`area_assignment`.`price` AS `price`,(`dodoma`.`plot_assignment`.`size` * `dodoma`.`area_assignment`.`price`) AS `total_price`,`dodoma`.`plot_reservation`.`deadline` AS `deadline`,`dodoma`.`user_details`.`first_name` AS `first_name`,`dodoma`.`user_details`.`middle_name` AS `middle_name`,`dodoma`.`user_details`.`last_name` AS `last_name`,`dodoma`.`user_details`.`address` AS `address`,`dodoma`.`user_details`.`region` AS `region`,`dodoma`.`plot_reservation`.`created_at` AS `created_at`,`dodoma`.`plot_reservation`.`user_detail_id` AS `user_credential_id`,`dodoma`.`user_details`.`photo` AS `photo` from (((((((`dodoma`.`user_details` join `dodoma`.`plots`) join `dodoma`.`blocks`) join `dodoma`.`areas`) join `dodoma`.`area_types`) join `dodoma`.`plot_assignment`) join `dodoma`.`area_assignment`) join `dodoma`.`plot_reservation`) where ((`dodoma`.`user_details`.`user_detail_id` = `dodoma`.`plot_reservation`.`user_detail_id`) and (`dodoma`.`plots`.`plot_id` = `dodoma`.`plot_reservation`.`plot_id`) and (`dodoma`.`blocks`.`block_id` = `dodoma`.`plot_reservation`.`block_id`) and (`dodoma`.`areas`.`area_id` = `dodoma`.`plot_reservation`.`area_id`) and (`dodoma`.`area_types`.`areas_type_id` = `dodoma`.`plot_reservation`.`areas_type_id`) and (`dodoma`.`plot_assignment`.`area_id` = `dodoma`.`plot_reservation`.`area_id`) and (`dodoma`.`plot_assignment`.`areas_type_id` = `dodoma`.`plot_reservation`.`areas_type_id`) and (`dodoma`.`plot_assignment`.`block_id` = `dodoma`.`plot_reservation`.`block_id`) and (`dodoma`.`plot_assignment`.`plot_id` = `dodoma`.`plot_reservation`.`plot_id`) and (`dodoma`.`area_assignment`.`areas_type_id` = `dodoma`.`plot_reservation`.`areas_type_id`) and (`dodoma`.`area_assignment`.`area_id` = `dodoma`.`plot_reservation`.`area_id`)AND plot_assignment.status=true)");

        return json_encode($land_uses);
    }
      public function GetBlock()
    {
        $area_id = $_GET['area_id'];
        $areas_type_id = $_GET['areas_type_id'];

        $land_uses = DB::select("SELECT plot_assignment.plot_id,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id, areas.name AS location, area_types.name
        as land_use, blocks.name as block, plot_assignment.size, plots.plot_no, plot_assignment.published as published, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id and plot_assignment.areas_type_id='$areas_type_id' and plot_assignment.area_id='$area_id' ORDER BY plot_assignment.updated_at AND plot_assignment.published=false DESC");

        return json_encode($land_uses);
    }
     public function trial2()
    {
        $area_id = $_GET['area_id'];
       // $reserved = $_GET['reserved'];

        $land_uses = DB::select("SELECT plot_assignment.plot_id,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id, areas.name AS location, area_types.name
        as land_use, blocks.name as block, plot_assignment.size, plots.plot_no, plot_assignment.published as published, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id and plot_assignment.published=true and plot_assignment.status=false and plot_assignment.area_id='$area_id' ORDER BY plot_assignment.updated_at DESC");
        // $area_types = AreaType::all();
        // $blocks = Block::all(); 
        //dd($plot_assignments);
    
        return json_encode($land_uses);
    }
    public function triall()
    {
        $area_id = $_GET['area_id'];
        $reserved = $_GET['reserved'];
        $areas_type_id = $_GET['area_type_id'];


        $land_uses = DB::select("select `dodoma`.`plots`.`plot_no` AS `plot_no`,`dodoma`.`blocks`.`name` AS `block`,`dodoma`.`areas`.`name` AS `location`,`dodoma`.`area_types`.`name` AS `land_use`,`dodoma`.`plot_assignment`.`size` AS `size`,`dodoma`.`area_assignment`.`price` AS `price`,(`dodoma`.`plot_assignment`.`size` * `dodoma`.`area_assignment`.`price`) AS `total_price`,`dodoma`.`plot_reservation`.`deadline` AS `deadline`,`dodoma`.`user_details`.`first_name` AS `first_name`,`dodoma`.`user_details`.`middle_name` AS `middle_name`,`dodoma`.`user_details`.`last_name` AS `last_name`,`dodoma`.`user_details`.`address` AS `address`,`dodoma`.`user_details`.`region` AS `region`,`dodoma`.`plot_reservation`.`created_at` AS `created_at`,`dodoma`.`plot_reservation`.`user_detail_id` AS `user_credential_id`,`dodoma`.`user_details`.`photo` AS `photo` from (((((((`dodoma`.`user_details` join `dodoma`.`plots`) join `dodoma`.`blocks`) join `dodoma`.`areas`) join `dodoma`.`area_types`) join `dodoma`.`plot_assignment`) join `dodoma`.`area_assignment`) join `dodoma`.`plot_reservation`) where ((`dodoma`.`user_details`.`user_detail_id` = `dodoma`.`plot_reservation`.`user_detail_id`) and (`dodoma`.`plots`.`plot_id` = `dodoma`.`plot_reservation`.`plot_id`) and (`dodoma`.`blocks`.`block_id` = `dodoma`.`plot_reservation`.`block_id`) and (`dodoma`.`areas`.`area_id` = `dodoma`.`plot_reservation`.`area_id`) and (`dodoma`.`area_types`.`areas_type_id` = `dodoma`.`plot_reservation`.`areas_type_id`) and (`dodoma`.`plot_assignment`.`area_id` = `dodoma`.`plot_reservation`.`area_id`) and (`dodoma`.`plot_assignment`.`areas_type_id` = `dodoma`.`plot_reservation`.`areas_type_id`) and (`dodoma`.`plot_assignment`.`block_id` = `dodoma`.`plot_reservation`.`block_id`) and (`dodoma`.`plot_assignment`.`plot_id` = `dodoma`.`plot_reservation`.`plot_id`) and (`dodoma`.`area_assignment`.`areas_type_id` = `dodoma`.`plot_reservation`.`areas_type_id`) and (`dodoma`.`area_assignment`.`area_id` = `dodoma`.`plot_reservation`.`area_id`)AND plot_assignment.area_id='$area_id' and plot_assignment.status='$reserved' and plot_assignment.areas_type_id='$areas_type_id')");

        return json_encode($land_uses);
    }
     public function GetSize()
    {
        $area_id = $_GET['area_id'];
        $block_id = $_GET['block_id'];
        $areas_type_id = $_GET['areas_type_id'];

        $land_uses = DB::select("SELECT plot_assignment.plot_id,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id, areas.name AS location, area_types.name
        as land_use, blocks.name as block, plot_assignment.size, plots.plot_no, plot_assignment.published as published, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id and plot_assignment.areas_type_id='$areas_type_id' and plot_assignment.area_id='$area_id' and plot_assignment.block_id='$block_id' ORDER BY plot_assignment.updated_at AND plot_assignment.published=false DESC");

        return json_encode($land_uses);
    }

    public function blockAssignmentsGetLandUse()
    {
        $area_id = $_GET['area_id'];

        $land_uses = DB::select("SELECT area_types.areas_type_id, area_types.name FROM area_types WHERE area_types.areas_type_id IN (SELECT area_types.areas_type_id FROM area_types, area_assignment WHERE area_types.areas_type_id=area_assignment.areas_type_id AND area_assignment.area_id=$area_id)");

        return json_encode($land_uses);
    }

    public function blockAssignmentsGetBlock()
    {
        $area_id = $_GET['area_id'];
        $areas_type_id = $_GET['areas_type_id'];

        $blocks = DB::select("SELECT blocks.block_id, blocks.name FROM blocks WHERE blocks.block_id NOT IN (SELECT block_assignment.block_id FROM block_assignment WHERE block_assignment.area_id= $area_id AND block_assignment.areas_type_id=$areas_type_id)");

        return json_encode($blocks);
    }

    public function plotAssignmentsGetLandUses()
    {
        $area_id = $_GET['area_id'];

        $land_uses = DB::select("SELECT * FROM  area_types, area_assignment WHERE area_types.areas_type_id=area_assignment.areas_type_id AND area_assignment.area_id=$area_id");

        return json_encode($land_uses);
    }

    public function plotAssignmentsGetBlock()
    {
        $area_id = $_GET['area_id'];
        $areas_type_id = $_GET['areas_type_id'];

        $blocks = DB::select("SELECT * FROM blocks, block_assignment WHERE blocks.block_id=block_assignment.block_id AND block_assignment.area_id=$area_id AND block_assignment.areas_type_id=$areas_type_id");

        return json_encode($blocks);
    }
     public function published(){
        $area_id = $_GET['area_id'];

        $sql = "SELECT plot_assignment.plot_id,plot_assignment.plot_id,plot_assignment.status,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id, areas.name AS location, area_types.name
 as land_use, blocks.name as block, plots.plot_no, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id and plot_assignment.area_id='$area_id' ORDER BY plot_assignment.updated_at DESC;";

        
        $land_uses = DB::select($sql);
    

       return json_encode($land_uses);
        
    }
}
