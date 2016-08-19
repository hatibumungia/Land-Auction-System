<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Area;
use App\AreaType;
use App\Block;
use App\Plot;

class SearchController extends Controller
{


    public function index(){

        $areas = Area::all();
        $area_types = AreaType::all();
        $blocks = Block::all();
        $plots = Plot::all();

        return view('search.index', compact('areas', 'area_types', 'blocks', 'plots'));
    }

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


    public function getPlot(){
        $area_id['area_id'] = $_GET['area_id'];
        $area_id['area_type_id'] = $_GET['area_type_id'];
        $area_id['block_id'] = $_GET['block_id'];

        $sql = "SELECT * FROM plot_assignment,plots,area_assignment WHERE area_assignment.area_id = plot_assignment.area_id and area_assignment.areas_type_id=plot_assignment.areas_type_id and plot_assignment.plot_id = plots.plot_id and plot_assignment.area_id=:area_id and plot_assignment.areas_type_id=:area_type_id and plot_assignment.block_id=:block_id";
        return json_encode(DB::SELECT($sql,$area_id));
    }

}
