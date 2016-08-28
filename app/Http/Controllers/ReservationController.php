<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use App\UserCredential;
use App\UserDetail;
use Illuminate\Support\Facades\Session;
use DB;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('applicant');
    }

    public function index()
    {

        $params['area_id'] = $_GET['areaId'];
        $params['area_type_id'] = $_GET['area_type_id'];
        $params['block_id'] = $_GET['block_id'];
        $params['plot_id'] = $_GET['plot_id'];

        $sql = "SELECT areas.name as location, area_types.name as land_use, blocks.name as block, plot_assignment.plot_id as plot_no, plot_assignment.size as size, (plot_assignment.size * area_assignment.price) as price FROM areas, area_types, blocks, plot_assignment, area_assignment WHERE areas.area_id=plot_assignment.area_id and area_types.areas_type_id=plot_assignment.areas_type_id and blocks.block_id=plot_assignment.block_id AND plot_assignment.area_id=:area_id AND plot_assignment.areas_type_id=:area_type_id AND plot_assignment.block_id=:block_id AND plot_assignment.plot_id=:plot_id AND plot_assignment.status=0;";

        $unconfirmed_reservation = DB::select($sql, $params);

        $user_credential = UserCredential::findOrFail(session('id'));

        $user_detail = UserDetail::findOrFail($user_credential->user_detail_id);

        return view('reservations.index', compact('user_detail', 'unconfirmed_reservation'));
    }

    public function logout()
    {
        Session::flush();

        return redirect('/applicants/login');
    }
}
