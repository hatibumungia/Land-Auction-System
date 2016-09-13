<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserDetail;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $user = UserDetail::findOrFail(Session::get('id'));
        return view('admin.dashboard.index', compact('user'));
    }
}
