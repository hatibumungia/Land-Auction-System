<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\AreaType;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Db;

class ReportController extends Controller
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
		$reserved=$_GET['reserved'];
		$land_uses = DB::select("SELECT plot_assignment.plot_id,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id,plot_assignment.published, areas.name AS location, area_types.name
			as land_use, blocks.name as block, plot_assignment.size, plots.plot_no, plot_assignment.published as published, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id  and plot_assignment.area_id='$area_id' AND plot_assignment.published='$reserved'  ORDER BY plot_assignment.updated_at DESC");

		return json_encode($land_uses);
	}

	public function GetBlock()
	{
		$area_id = $_GET['area_id'];
		$areas_type_id = $_GET['areas_type_id'];
		$reserved=$_GET['reserved'];
		$land_uses = DB::select("SELECT plot_assignment.plot_id,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id,plot_assignment.published, areas.name AS location, area_types.name
			as land_use, blocks.name as block, plot_assignment.size, plots.plot_no, plot_assignment.published as published, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id and plot_assignment.areas_type_id='$areas_type_id' and plot_assignment.area_id='$area_id' AND plot_assignment.published='$reserved'  ORDER BY plot_assignment.updated_at DESC");

		return json_encode($land_uses);
	}

	public function GetSize()
	{
		$area_id = $_GET['area_id'];
		$reserved=$_GET['reserved'];
		$block_id = $_GET['block_id'];
		$areas_type_id = $_GET['areas_type_id'];

		$land_uses = DB::select("SELECT plot_assignment.plot_id,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id,plot_assignment.published, areas.name AS location, area_types.name
			as land_use, blocks.name as block, plot_assignment.size, plots.plot_no, plot_assignment.published as published, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id and plot_assignment.areas_type_id='$areas_type_id' and plot_assignment.area_id='$area_id' and plot_assignment.block_id='$block_id' AND plot_assignment.published='$reserved' ORDER BY plot_assignment.updated_at  DESC");

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
		$reserved=$_GET['reserved'];

		$land_uses = DB::select("SELECT plot_assignment.plot_id,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id,plot_assignment.published, areas.name AS location, area_types.name
			as land_use, blocks.name as block, plot_assignment.size, plots.plot_no, plot_assignment.published as published, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id AND plot_assignment.published='$reserved' ORDER BY plot_assignment.updated_at  DESC");


		return json_encode($land_uses);

	}
}
