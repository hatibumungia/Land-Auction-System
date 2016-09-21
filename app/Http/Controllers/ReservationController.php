<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Auth;
use App\UserCredential;
use App\UserDetail;
use Illuminate\Support\Facades\Session;
use DB;
use PDF;
use App\PlotReservation;

use App\Http\Requests\CreateUserDetailRequest;

class ReservationController extends Controller
{
    public function __construct()
    {
        // $this->middleware('applicant');
    }

    public function checkForParameters()
    {
        return empty($_GET['areaId']) || empty($_GET['area_type_id']) || empty($_GET['block_id']) || empty($_GET['plot_id']);
    }

    public function index()
    {
        if (Session::has('temp_reservation_areaId') && Session::has('temp_reservation_area_type_id') && Session::has('temp_reservation_block_id') && Session::has('temp_reservation_plot_id')) {


// Capture the session values
            $params['temp_reservation_areaId'] = session('temp_reservation_areaId');
            $params['temp_reservation_area_type_id'] = session('temp_reservation_area_type_id');
            $params['temp_reservation_block_id'] = session('temp_reservation_block_id');
            $params['temp_reservation_plot_id'] = session('temp_reservation_plot_id');

            $areaId = session('temp_reservation_areaId');
            $area_type_id = session('temp_reservation_area_type_id');
            $block_id = session('temp_reservation_block_id');
            $plot_id = session('temp_reservation_plot_id');

            // Check if the plot is already taken
            $sql_check_plot_status = '
SELECT
*
FROM
plot_assignment
WHERE
area_id=:temp_reservation_areaId AND
areas_type_id=:temp_reservation_area_type_id AND
block_id=:temp_reservation_block_id AND
plot_id=:temp_reservation_plot_id AND
status=0
        ';

            $plot_status = DB::select($sql_check_plot_status, $params);

            if (count($plot_status) == 0) {
                Session::flash('plot_status', 'Samahani, kiwanja ulichochagua kimeshachukuliwa. Tafadhali chagua kiwanja kingine.');
            } else {
                //session(['plot_status' => 'Thank you for reserving a plot, Now you must pay and complete the registration before printing the letter']);
                Session::flash('plot_status', 'Ahsante kwa kuchagua kiwanja, Sasa unatakiwa ulipe gharama ya maombi ya kiwanja na ukamilishe usajili wako ili upate barua ya maombi.');

                /* 1. insert into plot_reservations  table
                 *
                 *
                 */

                PlotReservation::create([
                    'area_id' => $params['temp_reservation_areaId'],
                    'areas_type_id' => $params['temp_reservation_area_type_id'],
                    'block_id' => $params['temp_reservation_block_id'],
                    'plot_id' => $params['temp_reservation_plot_id'],
                    'user_detail_id' => session('id'),
                    'deadline' => date('Y-m-d H:i:s', strtotime('+5 hours')),
                    'created_at' => date('Y-m-d H:i:s'),
                ]);

                // return 'plot_reservation inserted successfully';

                /*
                 * 2. Update the plot_assignment status
                 */

                $sql = "
            UPDATE plot_assignment SET status = '1'
            WHERE
            plot_assignment.area_id = $areaId AND
            plot_assignment.areas_type_id = $area_type_id AND
            plot_assignment.block_id = $block_id AND
            plot_assignment.plot_id = $plot_id
        ";

                $affected = DB::update($sql);

                if (sizeof($affected) == 1) {
                    // return "updatePlotAssignment succeeded";
                } else {
                    return "updatePlotAssignment failed";
                }

            }

            Session::forget('temp_reservation_areaId');
            Session::forget('temp_reservation_area_type_id');
            Session::forget('temp_reservation_block_id');
            Session::forget('temp_reservation_plot_id');
        }

        $sql = "
SELECT
plots.plot_id as plot_id, 
plots.plot_no AS plot_no,
blocks.name AS block,
areas.name AS location,
area_types.name AS land_use,
plot_assignment.size AS size,
(plot_assignment.size * area_assignment.price) AS price,
plot_reservation.deadline AS deadline,
plot_reservation.status
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
order by plot_reservation.created_at desc
                ";

        $plot_reservations = DB::select($sql, ['user_detail_id' => Session::get('id')]);

        $user = UserDetail::findOrFail(Session::get('id'));

        $i = 1;

        return view('reservations.all', compact('plot_reservations', 'user', 'i'));


    }

    public function print_preview($plot_no)
    {


        $registration_status = $this->checkRegistrationStatus(Session::get('id'));

        $registration_status = $registration_status[0]->registration_status;

        if ($registration_status == 1) {
            $params = [
                'user_credential_id' => Session::get('id'),
                'plot_no' => $plot_no
            ];

            $data = DB::select("SELECT * FROM plot_reservation_view WHERE plot_reservation_view.plot_no=:plot_no AND plot_reservation_view.user_credential_id=:user_credential_id LIMIT 0, 1", $params);


            if (sizeof($data) == 1) {

                $getPDF = PDF::loadView('reservations.print_preview', compact('data'));
                return $getPDF->stream('reservations.print_preview.pdf', ['Attachment' => 0], compact('data'));

            } else {
                return 'Hauruhusiwi kufanya hivyo';
            }
        } else {
            flash()->info('Kamilisha usajili kwanza ili uweze kuipata barua yako ya maombi ya kiwanja.');
            return redirect('/reservation/complete-registration');
        }

    }

    public function checkRegistrationStatus($user_detail_id_)
    {
        $sql = "SELECT user_details.registration_status FROM user_details WHERE user_detail_id=:user_detail_id";

        $registration_status = DB::select($sql, ['user_detail_id' => $user_detail_id_]);

        return $registration_status;
    }

    public function completeRegistration()
    {
        $user_detail = UserDetail::findOrFail(Session::get('id'));

        $user = UserDetail::findOrFail(Session::get('id'));

        return view('reservations.complete_registration', compact('user_detail', 'user'));
    }

    public
    function processCompleteRegistration(CreateUserDetailRequest $request)
    {

        $user_detail = UserDetail::findOrFail(Session::get('id'));

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {

            $image = $request->file('photo')->getClientOriginalName();

            $new_file = Session::get('id') . " @ " . time() . " - " . $image;

            $request->file('photo')->move(public_path() . '/img/uploads/avatars/', $new_file);

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

            flash()->success('Taarifa zako zimefanikiwa kuhifadhiwa');

            return redirect('reservation');


        } else {

            $user_detail->update([
                'first_name' => $request->input('first_name'),
                'middle_name' => $request->input('middle_name'),
                'last_name' => $request->input('last_name'),
                'address' => $request->input('address'),
                'region' => $request->input('region'),
                'district' => $request->input('district'),
                'ward' => $request->input('ward'),
                'house_number' => $request->input('house_number'),
                'registration_status' => 1,
            ]);

            flash()->success('Taarifa zako zimefanikiwa kuhifadhiwa');

            return redirect('reservation');

        }

    }

    public
    function logout()
    {

        // TODO: destory the session effectively

        Session::flush();

        return redirect('/');
    }
}
