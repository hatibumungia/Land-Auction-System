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

    public function blockAssignmentsGetLandUse()
    {
        $area_id = $_GET['area_id'];

        /*$land_uses = DB::select("SELECT area_types.areas_type_id, area_types.name FROM area_types WHERE area_types.areas_type_id NOT IN (SELECT block_assignment.areas_type_id FROM block_assignment WHERE block_assignment.area_id=$area_id)")*/;
        $land_uses = AreaType::all();

        return json_encode($land_uses);
    }

    public function blockAssignmentsGetBlock()
    {
        $area_id = $_GET['area_id'];
        $areas_type_id = $_GET['areas_type_id'];

        $blocks = DB::select("SELECT blocks.block_id, blocks.name FROM blocks WHERE blocks.block_id NOT IN (SELECT block_assignment.block_id FROM block_assignment WHERE block_assignment.area_id= $area_id AND block_assignment.areas_type_id=$areas_type_id)");

        return json_encode($blocks);
    }
}
