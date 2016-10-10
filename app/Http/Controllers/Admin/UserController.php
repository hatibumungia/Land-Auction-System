<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateUserRequest;
use App\Role;
use App\User;
use App\UserDetail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = DB::table('role_user')
                   ->join('user_details', 'role_user.user_id', '=', 'user_details.user_detail_id')
                   ->join('roles', 'role_user.user_id', '=', 'roles.id')
                   ->select('user_details.*', 'roles.display_name')
                   ->get();

        $user = UserDetail::findOrFail(Session::get('id'));

        return view('admin.staff.index', compact('staffs', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = UserDetail::findOrFail(Session::get('id'));
        return view('admin.staff.create', 'user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $password = $request->input('email');

        UserDetail::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($password)
        ]);

        return redirect('admin/staff');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = UserDetail::findOrFail($id);
        $roles = Role::getUserRoles($user->user_detail_id);
        $new_roles = Role::getNewRules($user->user_detail_id);
        return view('admin.staff.show', compact('user', 'roles', 'new_roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = UserDetail::findOrFail($id);
        
        
        return view('admin.staff.edit', compact('user'));
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
        $user = UserDetail::findOrFail($id);
        $user->update($request->all());

        return redirect('admin/staff');
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

    public function attachRole(Request $request)
    {
        $user = UserDetail::findOrFail($request->input('user_id'));

        $role = Role::findOrFail($request->input('role_id'));

        $user->attachRole($role);

        flash()->success('Success');

        return redirect('admin/staff');
    }
}
