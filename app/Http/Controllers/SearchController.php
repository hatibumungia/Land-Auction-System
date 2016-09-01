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


    public function index()
    {

        $areas = Area::all();
        $area_types = AreaType::all();
        $blocks = Block::all();
        $plots = Plot::all();

        return view('search.index', compact('areas', 'area_types', 'blocks', 'plots'));
    }

    public function getAreaType()
    {
        $area_id['area_id'] = $_GET['area_id'];
        $sql = "SELECT * FROM area_assignment,area_types WHERE area_assignment.areas_type_id = area_types.areas_type_id and area_assignment.area_id=:area_id";
        return json_encode(DB::SELECT($sql, $area_id));
    }

    public function getBlock()
    {
        $area_id['area_id'] = $_GET['area_id'];
        $area_id['area_type_id'] = $_GET['area_type_id'];

        $sql = "SELECT * FROM block_assignment,blocks WHERE block_assignment.block_id = blocks.block_id and block_assignment.area_id=:area_id and block_assignment.areas_type_id=:area_type_id ";
        return json_encode(DB::SELECT($sql, $area_id));
    }


    public function getPlot()
    {
        $area_id['area_id'] = $_GET['area_id'];
        $area_id['area_type_id'] = $_GET['area_type_id'];
        $area_id['block_id'] = $_GET['block_id'];

        $sql = "
SELECT plots.plot_no as plot_no, 
blocks.name as block, 
areas.name as location, 
plot_assignment.size as size, 
area_assignment.price as price,
block_assignment.file_name as file_name
FROM areas, area_types, blocks, plots, plot_assignment,area_assignment, block_assignment 
WHERE areas.area_id=plot_assignment.area_id 
AND plots.plot_id=plot_assignment.plot_id
AND area_types.areas_type_id=plot_assignment.areas_type_id 
AND blocks.block_id=plot_assignment.block_id 
AND area_assignment.area_id = plot_assignment.area_id 
AND area_assignment.areas_type_id=plot_assignment.areas_type_id 
AND block_assignment.area_id=plot_assignment.area_id 
AND block_assignment.areas_type_id=plot_assignment.areas_type_id 
AND plot_assignment.block_id=block_assignment.block_id 
AND plot_assignment.area_id=:area_id
AND plot_assignment.areas_type_id=:area_type_id 
AND plot_assignment.block_id=:block_id  
AND plot_assignment.status = 0      
        ";

        return json_encode(DB::SELECT($sql, $area_id));
    }

    public function performSearch()
    {

        $min_size = $_GET['min_size'];
        $max_size = $_GET['max_size'];

        // default query
        $sql = "SELECT areas.name AS location, area_types.name AS land_use, blocks.name AS block, plots.plot_no AS plot_no, plot_assignment.size AS size, area_assignment.price as price FROM areas, area_types, blocks, plot_assignment, area_assignment, plots WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id and area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id and plot_assignment.area_id = area_assignment.area_id and plot_assignment.areas_type_id=area_assignment.areas_type_id AND plot_assignment.size >= $min_size AND plot_assignment.size <= $max_size";

        // check if user has not specified both the area name and area type name
        if ((isset($_GET['area_id']) && $_GET['area_id'] != 0) && (isset($_GET['area_type_id']) && $_GET['area_type_id'] != 0)) {
            $params['area_id'] = $_GET['area_id'];
            $params['area_type_id'] = $_GET['area_type_id'];
            $sql .= " and plot_assignment.area_id=:area_id";
            $sql .= " and plot_assignment.areas_type_id=:area_type_id";

            $results = DB::SELECT($sql, $params);

            $results_array = [];

            if (sizeof($results) > 0) {

                $results_array = [];

                foreach ($results as $result) {
                    $results_array[] = [
                        $result->location,
                        $result->land_use,
                        $result->block,
                        $result->plot_no,
                        $result->size,
                        ($result->size * $result->price)
                    ];
                }

                return response()->json(['data' => $results_array]);

            } else {

                $results_array = [];

                foreach ($results as $result) {
                    $results_array[] = [
                        '',
                        '',
                        '',
                        '',
                        '',
                        ''
                    ];
                }

                return response()->json(['data' => $results_array]);

            }
        }


        // check if user has specified the area name only
        if (isset($_GET['area_id']) && $_GET['area_id'] != 0) {
            $params['area_id'] = $_GET['area_id'];

            $sql .= " and plot_assignment.area_id=:area_id";

            $results = DB::SELECT($sql, $params);

            if (sizeof($results) > 0) {

                $results_array = [];

                foreach ($results as $result) {
                    $results_array[] = [
                        $result->location,
                        $result->land_use,
                        $result->block,
                        $result->plot_no,
                        $result->size,
                        ($result->size * $result->price)
                    ];
                }

                return response()->json(['data' => $results_array]);

            } else {

                $results_array = [];

                foreach ($results as $result) {
                    $results_array[] = [
                        '',
                        '',
                        '',
                        '',
                        '',
                        ''
                    ];
                }

                return response()->json(['data' => $results_array]);

            }
        }

        // check if user has specified the area type name only
        if (isset($_GET['area_type_id']) && $_GET['area_type_id'] != 0) {
            $params['area_type_id'] = $_GET['area_type_id'];
            $sql .= " and plot_assignment.areas_type_id=:area_type_id";

            $results = DB::SELECT($sql, $params);

            if (sizeof($results) > 0) {

                $results_array = [];

                foreach ($results as $result) {
                    $results_array[] = [
                        $result->location,
                        $result->land_use,
                        $result->block,
                        $result->plot_no,
                        $result->size,
                        ($result->size * $result->price)
                    ];
                }

                return response()->json(['data' => $results_array]);

            } else {

                $results_array = [];

                foreach ($results as $result) {
                    $results_array[] = [
                        '',
                        '',
                        '',
                        '',
                        '',
                        ''
                    ];
                }

                return response()->json(['data' => $results_array]);

            }


        }


        /*        $area_id['min_size'] = $_GET['min_size'];
                $area_id['max_size'] = $_GET['max_size'];*/

        $results = DB::SELECT($sql);

        if (sizeof($results) > 0) {

            $results_array = [];

            foreach ($results as $result) {
                $results_array[] = [
                    $result->location,
                    $result->land_use,
                    $result->block,
                    $result->plot_no,
                    $result->size,
                    ($result->size * $result->price)
                ];
            }

            return response()->json(['data' => $results_array]);

        } else {

            $results_array = [];

            foreach ($results as $result) {
                $results_array[] = [
                    '',
                    '',
                    '',
                    '',
                    '',
                    ''
                ];
            }

            return response()->json(['data' => $results_array]);

        }

    }

    public function getReservationSummaryNames()
    {
        $params['area_id'] = $_GET['area_id'];
        $params['areas_type_id'] = $_GET['areas_type_id'];
        $params['block_id'] = $_GET['block_id'];

        $sql = "SELECT areas.name as location, area_types.name as land_use, blocks.name as block FROM areas, area_types, blocks WHERE areas.area_id=:area_id AND area_types.areas_type_id=:areas_type_id AND blocks.block_id=:block_id";

        $results = DB::select($sql, $params);

        if (sizeof($results) > 0) {

            $results_array = [];
            foreach ($results as $result) {
                $results_array = [
                    'location' => $result->location,
                    'land_use' => $result->land_use,
                    'block' => $result->block
                ];
            }

        } else {

            $results_array = [];

            foreach ($results as $result) {
                $results_array[] = [
                    '',
                    '',
                    ''
                ];
            }

            return response()->json(['data' => $results_array]);
        }

        return $results_array;
    }

}
