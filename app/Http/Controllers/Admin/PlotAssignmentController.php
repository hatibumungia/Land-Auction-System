<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreatePlotAssignmentRequest;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PlotAssignment;
use App\Area;
use App\AreaType;
use App\Block;
use DB;
use App\Plot;
use Illuminate\Support\Facades\Session;

class PlotAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sql = "SELECT plot_assignment.plot_id,plot_assignment.area_id,plot_assignment.areas_type_id,plot_assignment.block_id, areas.name AS location, area_types.name
 as land_use, blocks.name as block, plot_assignment.size, plots.plot_no, plot_assignment.published as published, plot_assignment.created_at, plot_assignment.updated_at FROM areas, area_types, blocks, plots, plot_assignment WHERE plot_assignment.plot_id=plots.plot_id and areas.area_id=plot_assignment.area_id AND area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id ORDER BY plot_assignment.updated_at DESC;";

        
        $plot_assignments = DB::select($sql);
        

        $user = UserDetail::findOrFail(Session::get('id'));
         $areas = Area::all();
        // $area_types = AreaType::all();
        // $blocks = Block::all(); 

        return view('admin.plot-assignments.index', compact('plot_assignments', 'user','areas','area_types','blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();

        $user = UserDetail::findOrFail(Session::get('id'));

        return view('admin.plot-assignments.create', compact('areas', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePlotAssignmentRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePlotAssignmentRequest $request)
    {

        // load the rows
        $results = \Excel::load($request->file('user_file'), function ($reader) {

        })->get();

        // iterate through the rows
        foreach ($results as $row) {

            // get the plot_id of the plot_no uploaded
            $plot_id = DB::select('SELECT plots.plot_id FROM plots WHERE plots.plot_no = :plot_no', ['plot_no' => $row->plot]);

            // initialize insertion in plot_assignment
            $plot_assignment = new PlotAssignment();
            $plot_assignment->area_id = $request->input('area_id');
            $plot_assignment->areas_type_id = $request->input('areas_type_id');
            $plot_assignment->block_id = $request->input('block_id');
            $plot_assignment->size = $row->size;

            // check if that plot_no exist or not in plots table
            if (count($plot_id) == 1) {
                //that plot_no exists, you have to fetch its id and assign
                $plot_assignment->plot_id = $plot_id[0]->plot_id;
            } else {
                // that plot_no does not exists, create it then fetch its id
                $plot = new Plot();
                $plot->plot_no = $row->plot;
                $plot->save();

                $plot_id = DB::select('SELECT plots.plot_id FROM plots WHERE plots.plot_no = :plot_no', ['plot_no' => $row->plot]);
                $plot_assignment->plot_id = $plot_id[0]->plot_id;
            }


            $plot_assignment->save();

        }

        flash()->success('Imefanikiwa kuwekwa');

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

    public function published($area_id, $areas_type_id, $block_id, $plot_id)
    {

        $update = "UPDATE plot_assignment SET published = true WHERE area_id = '$area_id'&& areas_type_id = '$areas_type_id' && block_id = '$block_id' && plot_id = '$plot_id' ";
        DB::UPDATE($update);
         return redirect('admin/plot-assignments');

        
    }

    public function unpublish($area_id, $areas_type_id, $block_id, $plot_id)
    {
        
        $update = "UPDATE plot_assignment SET published = false WHERE area_id = '$area_id'&& areas_type_id = '$areas_type_id' && block_id = '$block_id' && plot_id = '$plot_id' ";
        DB::UPDATE($update);
         return redirect('admin/plot-assignments');

        
    }
    public function publishAll(){
        $update = "UPDATE plot_assignment SET published = true";
        DB::UPDATE($update);
        return redirect('admin/plot-assignments');
    }
    public function unpublishAll(){
        $update = "UPDATE plot_assignment SET published = false";
        DB::UPDATE($update);
        return redirect('admin/plot-assignments');
    }

    public function check(Request $request, PlotAssignment $plot_assignment){

      // $update = "UPDATE plot_assignment SET published = true WHERE area_id = '1'";
      //  DB::UPDATE($update);
          
        
            $area_id = $request->input('area_id');
            $areas_type_id = $request->input('areas_type_id');
            $block_id = $request->input('block_id');

            if(!empty($area_id) && empty($areas_type_id) && empty($block_id)){
                $update = "UPDATE plot_assignment SET published = true WHERE area_id = '$area_id'";
                 DB::UPDATE($update);
            }elseif (!empty($area_id) && !empty($areas_type_id) && empty($block_id)) {
                $update = "UPDATE plot_assignment SET published = true WHERE area_id = '$area_id'&& areas_type_id = '$areas_type_id'";
                DB::UPDATE($update);
            }elseif (!empty($area_id) && !empty($areas_type_id) && !empty($block_id)) {
                $update = "UPDATE plot_assignment SET published = true WHERE area_id = '$area_id'&& areas_type_id = '$areas_type_id' && block_id = '$block_id'";
                    DB::UPDATE($update);
            }else{
                flash()->success("Select atleast one field");
            }

         return redirect('admin/plot-assignments');


    }
}
