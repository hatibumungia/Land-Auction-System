<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Area;
use App\AreaType;
use App\Block;
use App\Http\Requests\CreateBlockAssignmentRequest;
use App\BlockAssignment;
use DB;

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

        return view('admin.block-assignments.index', compact('block_assignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO: make the queries return locations which are not assigned

        $locations = Area::all();
        $land_uses = AreaType::all();
        $blocks = Block::all();

        return view('admin.block-assignments.create', compact('locations', 'land_uses', 'blocks'));
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
            $request->file('file_name')->move(public_path() . '/img/uploads/plots/', $image);

            BlockAssignment::create([
                'area_id' => $request->input('area_id'),
                'areas_type_id' => $request->input('areas_type_id'),
                'block_id' => $request->input('block_id'),
                'file_name' => $image
            ]);

            flash()->success('Assigned successfully');

            return redirect('admin/block-assignments/create');
        } else {
            flash()->error('File upload failed. Please try again later.');

            return redirect('admin/block-assignments/create');
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
