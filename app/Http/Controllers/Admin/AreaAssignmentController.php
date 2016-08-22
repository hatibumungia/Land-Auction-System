<?php

namespace App\Http\Controllers\Admin;

use App\AreaType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Area;
use App\Http\Requests\CreateAreaAssignmentRequest;
use App\AreaAssignment;

class AreaAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Area::all();
        $land_uses = AreaType::all();

        return view('admin.location-assignments.create', compact('locations', 'land_uses'));
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

        flash()->success('Added successfully');

        return redirect('admin/location-assignments/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
