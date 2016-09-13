<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AreaType;

use App\Http\Requests\CreateAreaTypeRequest;

class AreaTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $land_uses = AreaType::all();

        return view('admin.land-uses.index', compact('land_uses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.land-uses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAreaTypeRequest|\Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAreaTypeRequest $request)
    {
        AreaType::create($request->all());

        flash()->success($request->input('name'). ' imefanikiwa kuongezwa');

        return redirect('admin/land-uses/create');
    }

    /**
     * Display the specified resource.
     *
     * @param $areas_type_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($areas_type_id)
    {
        $land_use = AreaType::findOrFail($areas_type_id);

        return view('admin.land-uses.show', compact('land_use'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $areas_type_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit($areas_type_id)
    {
        $land_use = AreaType::findOrFail($areas_type_id);

        return view('admin.land-uses.edit', compact('land_use'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateAreaTypeRequest|\Illuminate\Http\Request $request
     * @param $areas_type_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(CreateAreaTypeRequest $request, $areas_type_id)
    {
        $land_use = AreaType::findOrFail($areas_type_id);

        $land_use->update($request->all());

        flash()->success('Imefanikiwa kuhaririwa');

        return redirect('admin/land-uses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $areas_type_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($areas_type_id)
    {
        $land_use = AreaType::findOrFail($areas_type_id);

        $land_use->delete();

        flash()->success($land_use->name . ' imefanikiwa kufutwa.');

        return redirect('admin/land-uses');
    }
}
