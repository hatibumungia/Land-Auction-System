<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\AreaImage;
use App\Http\Requests\CreateAreaImageRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AreaImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $area_images = DB::select('SELECT areas.area_id, areas.name, area_image.file_name, area_image.created_at, area_image.updated_at FROM areas, area_image WHERE areas.area_id=area_image.area_id ORDER BY areas.name ASC');

        return view('admin.area-images.index', compact('area_images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view('admin.area-images.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAreaImageRequest $request)
    {
        if ($request->hasFile('file_name') && $request->file('file_name')->isValid()) {

            $image = $request->file('file_name')->getClientOriginalName();

            $new_file = time() . " - " . $image;

            $request->file('file_name')->move(public_path() . '/img/uploads/areas/', $new_file);

            AreaImage::create([
                'area_id' => $request->input('area_id'),
                'file_name' => $new_file
            ]);

            flash()->success('Imefanikiwa');

            return redirect('admin/location-images');

        } else {
            return 'no file';
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
    public function edit($area_id)
    {
        
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
    public function destroy($area_id)
    {
        $area_image = AreaImage::findOrFail($area_id);

        $area_image->delete();

        flash()->success('Imefanikiwa kufutwa.');

        return redirect('admin/location-images');
    }
}
