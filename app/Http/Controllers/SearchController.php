<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    public function getAreaType(){
    	$area_id['area_id'] = $_GET['area_id'];
    	$sql = "SELECT * FROM area_assignment,area_types WHERE area_assignment.areas_type_id = area_types.areas_type_id and area_assignment.area_id=:area_id";
    	return json_encode(DB::SELECT($sql,$area_id));
    }

    public function getBlock(){
    	$area_id['area_id'] = $_GET['area_id'];
    	$area_id['area_type_id'] = $_GET['area_type_id'];

    	$sql = "SELECT * FROM block_assignment,blocks WHERE block_assignment.block_id = blocks.block_id and block_assignment.area_id=:area_id and block_assignment.areas_type_id=:area_type_id ";
    	return json_encode(DB::SELECT($sql,$area_id));
    }

}
