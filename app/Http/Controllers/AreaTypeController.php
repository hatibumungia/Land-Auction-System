<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\AreaType;

use App\Http\Requests\CreateAreaTypeRequest;

class AreaTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $land_uses = AreaType::all();

        return view('land-uses.index', compact('land_uses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('land-uses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAreaTypeRequest $request)
    {
        AreaType::create($request->all());

        flash()->success($request->input('name'). ' added successfully');

        return redirect('land-uses/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($areas_type_id)
    {
        $land_use = AreaType::findOrFail($areas_type_id);

        return view('land-uses.show', compact('land_use'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($areas_type_id)
    {
        $land_use = AreaType::findOrFail($areas_type_id);

        return view('land-uses.edit', compact('land_use'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAreaTypeRequest $request, $areas_type_id)
    {
        $land_use = AreaType::findOrFail($areas_type_id);

        $land_use->update($request->all());

        flash()->success('Updated successfully');

        return redirect('land-uses'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($areas_type_id)
    {
        $land_use = AreaType::findOrFail($areas_type_id);

        $land_use->delete();

        flash()->success($land_use->name . ' deleted successfully');

        return redirect('land-uses');
    }
}
