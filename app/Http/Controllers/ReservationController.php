<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use App\UserCredential;
use App\UserDetail;
use Illuminate\Support\Facades\Session;
use DB;
use App\Http\Requests\CreateUserDetailRequest;

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
            


            $sql = "
SELECT
plots.plot_no AS plot_no,
blocks.name AS block,
areas.name AS location,
area_types.name AS land_use,
plot_assignment.size AS size,
(plot_assignment.size * area_assignment.price) AS price,
plot_reservation.deadline AS deadline
FROM
plots, blocks, areas, area_types, plot_assignment, area_assignment, plot_reservation
WHERE
plots.plot_id=plot_reservation.plot_id AND
blocks.block_id=plot_reservation.block_id AND
areas.area_id=plot_reservation.area_id AND
area_types.areas_type_id=plot_reservation.areas_type_id AND
plot_assignment.area_id=plot_reservation.area_id AND
plot_assignment.areas_type_id=plot_reservation.areas_type_id AND
plot_assignment.block_id=plot_reservation.block_id AND
plot_assignment.plot_id=plot_reservation.plot_id AND
area_assignment.areas_type_id=plot_reservation.areas_type_id AND
area_assignment.area_id=plot_reservation.area_id AND
plot_reservation.user_detail_id=:user_detail_id               
               
                ";

            $plot_reservations = DB::select($sql, ['user_detail_id' => Session::get('id')]);

            // return $plot_reservations;
            
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

    public function print_preview($plot_no)
    {

        $params = [
            'user_credential_id' => Session::get('id'),
            'plot_no' => $plot_no
        ];

        $data = DB::select("SELECT * FROM plot_reservation_view WHERE plot_reservation_view.plot_no=:plot_no AND plot_reservation_view.user_credential_id=:user_credential_id LIMIT 0, 1", $params);


        if (sizeof($data) == 1){
            return view('reservations.print_preview', compact('data'));
        }else{
            return 'You are trying to steal. We will catch you.';
        }

    }

    public function completeRegistration()
    {
        $user_detail = UserDetail::findOrFail(Session::get('id'));

        return view('reservations.complete_registration', compact('user_detail'));
    }

    public function processCompleteRegistration(CreateUserDetailRequest $request)
    {


        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {

            $image = $request->file('photo')->getClientOriginalName();

            $new_file = Session::get('id') . " @ " . time() . " - " . $image;

            $request->file('photo')->move(public_path() . '/img/uploads/avatars/', $new_file);

            $user_detail = UserDetail::findOrFail(Session::get('id'));

            $user_detail->update([
                'first_name' => $request->input('first_name'),
                'middle_name' => $request->input('middle_name'),
                'last_name' => $request->input('last_name'),
                'photo' => $new_file,
                'address' => $request->input('address'),
                'region' => $request->input('region'),
                'district' => $request->input('district'),
                'ward' => $request->input('ward'),
                'house_number' => $request->input('house_number'),
                'registration_status' => 1,
                ]);

            flash()->success('Updated successfully');

            return redirect('reservation/complete-registration');


        } else {
            flash()->error('File upload failed. Please try again later.');

            return redirect('reservation/complete-registration');
        }

    }

    public function logout()
    {
        
        // TODO: destory the session effectively
        
        Session::flush();

        return redirect('/applicants/login');
    }
}
