<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateRoleRequest;
use App\Permission;
use App\Role;
use App\UserDetail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $user = UserDetail::findOrFail(Session::get('id'));
        return view('admin.roles.index', compact('roles', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = UserDetail::findOrFail(Session::get('id'));
        return view('admin.roles.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRoleRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        Role::create([
            'name' => str_slug($request->input('display_name'), '-'),
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description')
        ]);

        flash()->success('Success');

        return redirect('admin/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::getRolePermissions($role->id);
        $new_permissions = Permission::getNewPermissions($role->id);
        $user = UserDetail::findOrFail(Session::get('id'));
        return view('admin.roles.show', compact('role', 'permissions', 'new_permissions', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $user = UserDetail::findOrFail(Session::get('id'));
        return view('admin.roles.edit', compact('role', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateRoleRequest $request, $id)
    {
        $role = Role::findOrFail($id);

        $role->update($request->all());

        flash()->success('Success');

        return redirect('admin/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id); // Pull back a given role

        DB::statement('DELETE FROM roles WHERE id=:id', ['id' => $role->id]);

        flash()->success('Success');
        
        return redirect('admin/roles');
    }

    public function attachPermission(Request $request)
    {
        $role = Role::findOrFail($request->input('role_id'));
        $permission = Permission::findOrFail($request->input('permission_id'));

        $role->attachPermission($permission);

        flash()->success('Success');

        return redirect('admin/roles');
    }

}
