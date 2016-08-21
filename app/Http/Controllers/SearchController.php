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


    // default query
    $sql = "SELECT areas.name as area_name, area_types.name as area_type_name, blocks.name as block_name, plots.plot_no as plot_no, plot_assignment.size as plot_size, area_assignment.price as price FROM plot_assignment,plots,area_assignment, areas, area_types,blocks WHERE area_assignment.area_id = plot_assignment.area_id and area_assignment.areas_type_id=plot_assignment.areas_type_id and plot_assignment.plot_id = plots.plot_id and plot_assignment.areas_type_id=area_types.areas_type_id and areas.area_id=plot_assignment.area_id and plot_assignment.block_id=blocks.block_id";




        // check if user has not specified both the area name and area type name
        if ((isset($_GET['area_id']) && $_GET['area_id'] != 0) && (isset($_GET['area_type_id']) && $_GET['area_type_id'] != 0)) {
            $params['area_id'] = $_GET['area_id'];
            $params['area_type_id'] = $_GET['area_type_id'];
            $sql .= " and plot_assignment.area_id=:area_id";
            $sql .= " and plot_assignment.areas_type_id=:area_type_id";

            $results = DB::SELECT($sql, $params);

            $results_array = [];

            foreach ($results as $result) {
                $results_array[] = [
                    $result->area_name,
                    $result->area_type_name,
                    $result->block_name,
                    $result->plot_no,
                    $result->plot_size,
                    $result->price
                ];
            }

            return response()->json(['data' => $results_array]);
        }


        // check if user has specified the area name only 
        if (isset($_GET['area_id']) && $_GET['area_id'] != 0) {
            $params['area_id'] = $_GET['area_id'];
            $sql .= " and plot_assignment.area_id=:area_id";

            $results = DB::SELECT($sql, $params);

            $results_array = [];

            foreach ($results as $result) {
                $results_array[] = [
                    $result->area_name,
                    $result->area_type_name,
                    $result->block_name,
                    $result->plot_no,
                    $result->plot_size,
                    $result->price
                ];
            }

            return response()->json(['data' => $results_array]);
        }

        // check if user has specified the area type name only 
        if(isset($_GET['area_type_id']) && $_GET['area_type_id'] != 0){
            $params['area_type_id'] = $_GET['area_type_id'];
            $sql .= " and plot_assignment.areas_type_id=:area_type_id";

            $results = DB::SELECT($sql, $params);

            $results_array = [];

            foreach ($results as $result) {
                $results_array[] = [
                    $result->area_name,
                    $result->area_type_name,
                    $result->block_name,
                    $result->plot_no,
                    $result->plot_size,
                    $result->price
                ];
            }

            return response()->json(['data' => $results_array]);


        }

        
        
/*        $area_id['min_size'] = $_GET['min_size'];
        $area_id['max_size'] = $_GET['max_size'];*/

        $results = DB::SELECT($sql);

        $results_array = [];

        foreach ($results as $result) {
            $results_array[] = [
                $result->area_name,
                $result->area_type_name,
                $result->block_name,
                $result->plot_no,
                $result->plot_size,
                $result->price
            ];
        }

        return response()->json(['data' => $results_array]);

    }

}
