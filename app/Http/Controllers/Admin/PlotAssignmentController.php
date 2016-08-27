<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreatePlotAssignmentRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PlotAssignment;
use App\Area;
use App\AreaType;
use App\Block;
use DB;
use App\Plot;

class PlotAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = "SELECT areas.name AS location, area_types.name
 as land_use, blocks.name as block, plot_assignment.size, plots.plot_no FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id;";

        $plot_assignments = DB::select($sql);

        return view('admin.plot-assignments.index', compact('plot_assignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // TODO: don't fetch the rows which are already assigned

        $areas = Area::all();

        $area_types = AreaType::all();

        $blocks = Block::all();

        return view('admin.plot-assignments.create', compact('areas', 'area_types', 'blocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePlotAssignmentRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePlotAssignmentRequest $request)
    {
        $results = \Excel::load($request->file('user_file'), function ($reader) {

        })->get();

        foreach ($results as $row) {
            /** @var TYPE_NAME $plot_assignment */

            $plot_id = DB::table('plots')->where('plot_no',$row->plot)->value('plot_id');


            $plot_assignment = new PlotAssignment();
            $plot_assignment->area_id = $request->input('area_id');
            $plot_assignment->areas_type_id = $request->input('areas_type_id');
            $plot_assignment->block_id = $request->input('block_id');
            $plot_assignment->size = $row->size;
            if(sizeof($plot_id) > 0){
                $plot_assignment->plot_id = $plot_id;
            }else{
                $plot = new Plot();
                $plot->plot_no = $row->plot;
                $plot->save();
                $insertedId  = $plot->id;
                $plot_assignment->plot_id = $insertedId ;
            }

            $plot_assignment->save();
        }

        flash()->success('Added successfully');

        return redirect('admin/plot-assignments');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function downloadSample()
    {
        return response()->download(public_path() . "/contents/samples/plot assignment.xlsx");
    }
}
