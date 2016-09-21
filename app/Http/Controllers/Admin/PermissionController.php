<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreatePermissionRequest;
use App\Http\Requests\EditPermissionRequest;
use App\Permission;
use App\UserDetail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        $user = UserDetail::findOrFail(Session::get('id'));
        return view('admin.permissions.index', compact('permissions', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = UserDetail::findOrFail(Session::get('id'));
        return view('admin.permissions.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePermissionRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePermissionRequest $request)
    {
        Permission::create([
            'name' => str_slug($request->input('display_name'), '-'),
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description')
        ]);

        flash()->success('Success');

        return redirect('admin/permissions');
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
        $permission = Permission::findOrFail($id);
        $user = UserDetail::findOrFail(Session::get('id'));
        
        return view('admin.permissions.edit', compact('permission', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreatePermissionRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPermissionRequest $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->update($request->all());

        flash()->success('Success');

        return redirect('admin/permissions');
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
