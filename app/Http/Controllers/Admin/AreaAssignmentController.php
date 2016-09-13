<?php

namespace App\Http\Controllers\Admin;


use App\UserDetail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Area;
use App\Http\Requests\CreateAreaAssignmentRequest;
use App\AreaAssignment;
use DB;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Integer;

class AreaAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = "SELECT areas.name AS location, area_types.name as land_use, area_assignment.price as price FROM areas, area_types, area_assignment WHERE areas.area_id=area_assignment.area_id and area_types.areas_type_id=area_assignment.areas_type_id";

        $location_assignments = DB::select($sql);

        $user = UserDetail::findOrFail(Session::get('id'));

        return view('admin.location-assignments.index', compact('location_assignments', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Area::all();

        return view('admin.location-assignments.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAreaAssignmentRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAreaAssignmentRequest $request)
    {

        AreaAssignment::create($request->all());

        flash()->success('Umefanikiwa Kuongeza');

        return redirect('admin/location-assignments/create');
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
     * @param $location
     * @param $land_use
     * @param $price
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit($location, $land_use, $price)
    {
        $data = [
            'location' => $location,
            'land_use' => $land_use,
            'price' => $price
        ];

        return view('admin.location-assignments.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateAreaAssignmentRequest|Request $request
     * @param $location
     * @param $land_use
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(CreateAreaAssignmentRequest $request, $location, $land_use)
    {

        $area_id = DB::select("SELECT areas.area_id FROM areas WHERE areas.name = '" . $location . "'");
        $area_type_id = DB::select("SELECT area_types.areas_type_id FROM area_types WHERE area_types.name = '" . $land_use . "'");

        $data[] = $price = $request->input('price');

        foreach ($area_id as $a_id){
            $data[] = $a_id->area_id;
        }

        foreach ($area_type_id as $at_id){
            $data[] = $at_id->areas_type_id;
        }


        $affected = DB::update('update area_assignment set price = ? where area_id = ? and areas_type_id = ?', $data);

        if($affected == 1){
            flash()->success('Umefanikiwa Kuhariri');

            return redirect('admin/location-assignments');
        }else{
            flash()->error('Haijafanikiwa Kuhariri');

            return redirect('admin/location-assignments');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($location)
    {
        return 'Imefuta...' . $location;
    }
}
