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

    public function checkForParameters()
    {
        return empty($_GET['areaId']) || empty($_GET['area_type_id']) || empty($_GET['block_id']) || empty($_GET['plot_id']);
    }

    public function index()
    {
        if ($this->checkForParameters()) {
            // return "no parameters";
            
            // TODO: this query should be filtered more

            $sql = "
               
SELECT
plots.plot_no AS  plot_no,
blocks.name AS block,
areas.name AS location,
area_types.name AS land_use,
plot_assignment.size AS size,
area_assignment.price AS price,
plot_reservation.deadline AS deadline
FROM
plots, blocks, areas, area_types, plot_assignment, area_assignment, plot_reservation
WHERE
plots.plot_id = plot_reservation.plot_id AND
blocks.block_id = plot_reservation.block_id AND
areas.area_id = plot_reservation.area_id AND
area_types.areas_type_id = plot_reservation.areas_type_id AND
plot_reservation.user_detail_id = :user_detail_id                
               
                ";

            $plot_reservations = DB::select($sql, ['user_detail_id' => Session::get('id')]);
            
            return view('reservations.all', compact('plot_reservations'));
        } else {
            // return "there is parameters";

            // TODO: make sure that the parameters are numbers and safe

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

    }

    public function logout()
    {
        
        // TODO: destory the session effectively
        
        Session::flush();

        return redirect('/applicants/login');
    }
}
