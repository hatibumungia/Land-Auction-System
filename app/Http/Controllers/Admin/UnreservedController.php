<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AreaType;
use App\Http\Requests;
use Db;

class UnreservedController extends Controller
{
    //
     public function trial()
    {
      $area_id = $_GET['area_id'];
       $land_uses = DB::select("SELECT plot_assignment.plot_id,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id, areas.name AS location, area_types.name
        as land_use, blocks.name as block, plot_assignment.size, plots.plot_no, plot_assignment.published as published, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id and plot_assignment.published=true and plot_assignment.status=false and plot_assignment.area_id='$area_id' ORDER BY plot_assignment.updated_at DESC");
        return json_encode($land_uses);
    }
     public function trial2()
    {
        $area_id = $_GET['area_id'];
        $areas_type_id = $_GET['areas_type_id'];
       // $reserved = $_GET['reserved'];

        $land_uses = DB::select("SELECT plot_assignment.plot_id,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id, areas.name AS location, area_types.name
        as land_use, blocks.name as block, plot_assignment.size, plots.plot_no, plot_assignment.published as published, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id and plot_assignment.published=true and plot_assignment.status=false and plot_assignment.area_id='$area_id' and plot_assignment.areas_type_id='$areas_type_id' ORDER BY plot_assignment.updated_at DESC");
    
        return json_encode($land_uses);
    }
    
    public function triall()
    {
        $area_id = $_GET['area_id'];
       $plot_block_id = $_GET['plot_block_id'];
       $areas_type_id = $_GET['areas_type_id'];


        $land_uses = DB::select("SELECT plot_assignment.plot_id,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id, areas.name AS location, area_types.name
        as land_use, blocks.name as block, plot_assignment.size, plots.plot_no, plot_assignment.published as published, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id and plot_assignment.published=true and plot_assignment.status=false and plot_assignment.area_id='$area_id' and plot_assignment.areas_type_id='$areas_type_id' and plot_assignment.block_id='$plot_block_id' ORDER BY plot_assignment.updated_at DESC");

        return json_encode($land_uses);
    }
}
