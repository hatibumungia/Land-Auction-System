<?php

namespace App\Http\Controllers\Admin;

use App\UserDetail;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateLocationRequest;
use App\Http\Controllers\Controller;
use App\Area;
use Illuminate\Support\Facades\Session;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Area::all();

        $user = UserDetail::findOrFail(Session::get('id'));

        return view('admin.locations.index', compact('locations', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateLocationRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLocationRequest $request)
    {
        Area::create($request->all());

        flash()->success($request->input('name') . ' imefanikiwa kuongezwa');

        return redirect('admin/locations/create');
    }

    /**
     * Display the specified resource.
     *
     * @param $area_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($area_id)
    {
        $location = Area::findOrFail($area_id);

        return view('admin.locations.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $area_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit($area_id)
    {
        $location = Area::findOrFail($area_id);

        return view('admin.locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateLocationRequest|Request $request
     * @param $area_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(CreateLocationRequest $request, $area_id)
    {
        $location = Area::findOrFail($area_id);

        $location->update($request->all());

        flash()->success('Imefanikiwa kuhaririwa');

        return redirect('admin/locations');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $area_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($area_id)
    {
        $location = Area::findOrFail($area_id);

        $location->delete();

        flash()->success($location->name . ' imefanikiwa kufutwa.');

        return redirect('admin/locations');

    }
}
