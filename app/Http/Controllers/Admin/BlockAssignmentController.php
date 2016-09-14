<?php

namespace App\Http\Controllers\Admin;

use App\UserDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Area;

use App\Http\Requests\CreateBlockAssignmentRequest;
use App\BlockAssignment;
use DB;
use Illuminate\Support\Facades\Session;

class BlockAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = "SELECT areas.name AS location, area_types.name as land_use, blocks.name as block, block_assignment.file_name as map FROM areas, area_types, blocks, block_assignment WHERE areas.area_id=block_assignment.area_id AND area_types.areas_type_id=block_assignment.areas_type_id AND blocks.block_id = block_assignment.block_id";

        $block_assignments = DB::select($sql);

        $user = UserDetail::findOrFail(Session::get('id'));

        return view('admin.block-assignments.index', compact('block_assignments', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Area::all();

        $user = UserDetail::findOrFail(Session::get('id'));

        return view('admin.block-assignments.create', compact('locations', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateBlockAssignmentRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBlockAssignmentRequest $request)
    {
        if ($request->hasFile('file_name') && $request->file('file_name')->isValid()) {

            $image = $request->file('file_name')->getClientOriginalName();

            $new_file = time() . " - " . $image;

            $request->file('file_name')->move(public_path() . '/img/uploads/plots/', $new_file);

            BlockAssignment::create([
                'area_id' => $request->input('area_id'),
                'areas_type_id' => $request->input('areas_type_id'),
                'block_id' => $request->input('block_id'),
                'file_name' => $new_file
            ]);

            flash()->success('Imefanikiwa');

            return redirect('admin/block-assignments/create');

        } else {

            BlockAssignment::create([
                'area_id' => $request->input('area_id'),
                'areas_type_id' => $request->input('areas_type_id'),
                'block_id' => $request->input('block_id')
            ]);

            // flash()->error('Imeshindwa kupakia picha. Tafadhali jaribu tena baadae.');
            flash()->success('Imefanikiwa');

            return redirect('admin/block-assignments');
        }

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
}
