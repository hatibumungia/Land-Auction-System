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

    public function performSearch(){


    $sql = "SELECT areas.name as area_name, area_types.name as area_type_name, blocks.name as block_name, plots.plot_no as plot_no, plot_assignment.size as plot_size, area_assignment.price as price FROM plot_assignment,plots,area_assignment, areas, area_types,blocks WHERE area_assignment.area_id = plot_assignment.area_id and area_assignment.areas_type_id=plot_assignment.areas_type_id and plot_assignment.plot_id = plots.plot_id and plot_assignment.areas_type_id=area_types.areas_type_id and areas.area_id=plot_assignment.area_id and plot_assignment.block_id=blocks.block_id";

        if (isset($_GET['area_id']) && $_GET['area_id'] != 0) {
            $params['area_id'] = $_GET['area_id'];
            $sql .= " and plot_assignment.area_id=:area_id";

            return json_encode(DB::SELECT($sql,$params));
        }

        if(isset($_GET['area_type_id']) && $_GET['area_type_id'] != 0){
            $params['area_type_id'] = $_GET['area_type_id'];
            $sql .= " and plot_assignment.areas_type_id=:area_type_id";

            return json_encode(DB::SELECT($sql,$params));
        }

        
        
/*        $area_id['min_size'] = $_GET['min_size'];
        $area_id['max_size'] = $_GET['max_size'];*/

        // return $sql;

        return json_encode(DB::SELECT($sql));
    }

}
