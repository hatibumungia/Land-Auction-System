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

        $sql = "
SELECT
plot_assignment.area_id,
plot_assignment.areas_type_id,
plot_assignment.block_id,
plot_assignment.plot_id, 
plots.plot_no as plot_no, 
blocks.name as block, 
areas.name as location, 
area_types.name as land_use,
plot_assignment.size as size, 
area_assignment.price as price,
block_assignment.file_name as file_name
FROM areas, area_types, blocks, plots, plot_assignment,area_assignment, block_assignment 
WHERE areas.area_id=plot_assignment.area_id 
AND plots.plot_id=plot_assignment.plot_id
AND area_types.areas_type_id=plot_assignment.areas_type_id 
AND blocks.block_id=plot_assignment.block_id 
AND area_assignment.area_id = plot_assignment.area_id 
AND area_assignment.areas_type_id=plot_assignment.areas_type_id 
AND block_assignment.area_id=plot_assignment.area_id 
AND block_assignment.areas_type_id=plot_assignment.areas_type_id 
AND plot_assignment.block_id=block_assignment.block_id 
AND plot_assignment.area_id=:area_id
AND plot_assignment.areas_type_id=:area_type_id
AND plot_assignment.block_id=:block_id
AND plot_assignment.plot_id=:plot_id        
        ";

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
