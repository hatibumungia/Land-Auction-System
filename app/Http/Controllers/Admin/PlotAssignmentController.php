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

class PlotAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = "SELECT plot_assignment.plot_assignment_id, areas.name AS location, area_types.name
 as land_use, blocks.name as block, plot_assignment.plot_no, plot_assignment.size FROM areas, area_types, blocks, plot_assignment WHERE areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id;";

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
            $plot_assignment = new PlotAssignment();
            $plot_assignment->area_id = $request->input('area_id');
            $plot_assignment->areas_type_id = $request->input('areas_type_id');
            $plot_assignment->block_id = $request->input('block_id');
            $plot_assignment->plot_no = $row->plot;
            $plot_assignment->size = $row->size;

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
