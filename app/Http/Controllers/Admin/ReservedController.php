<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Db;

class ReservedController extends Controller
{
    public function payment()
   {
   	$payment_details=$_GET['payment_details'];
    $plot_assignments = DB::select("select `dodoma`.`plots`.`plot_no` AS `plot_no`,`dodoma`.`blocks`.`name` AS `block`,`dodoma`.`areas`.`name` AS `location`,`dodoma`.`area_types`.`name` AS `land_use`,`dodoma`.`plot_assignment`.`size` AS `size`,`dodoma`.`area_assignment`.`price` AS `price`,(`dodoma`.`plot_assignment`.`size` * `dodoma`.`area_assignment`.`price`) AS `total_price`,`dodoma`.`plot_reservation`.`deadline` AS `deadline`,`dodoma`.`user_details`.`first_name` AS `first_name`,`dodoma`.`user_details`.`middle_name` AS `middle_name`,`dodoma`.`user_details`.`last_name` AS `last_name`,`dodoma`.`user_details`.`address` AS `address`,`dodoma`.`user_details`.`phone_number` AS `phone_number`,`dodoma`.`user_details`.`region` AS `region`,`dodoma`.`plot_reservation`.`created_at` AS `created_at`,`dodoma`.`plot_reservation`.`user_detail_id` AS `user_credential_id`,`dodoma`.`user_details`.`photo` AS `photo` from (((((((`dodoma`.`user_details` join `dodoma`.`plots`) join `dodoma`.`blocks`) join `dodoma`.`areas`) join `dodoma`.`area_types`) join `dodoma`.`plot_assignment`) join `dodoma`.`area_assignment`) join `dodoma`.`plot_reservation`) where ((`dodoma`.`user_details`.`user_detail_id` = `dodoma`.`plot_reservation`.`user_detail_id`) and (`dodoma`.`plots`.`plot_id` = `dodoma`.`plot_reservation`.`plot_id`) and (`dodoma`.`blocks`.`block_id` = `dodoma`.`plot_reservation`.`block_id`) and (`dodoma`.`areas`.`area_id` = `dodoma`.`plot_reservation`.`area_id`) and (`dodoma`.`area_types`.`areas_type_id` = `dodoma`.`plot_reservation`.`areas_type_id`) and (`dodoma`.`plot_assignment`.`area_id` = `dodoma`.`plot_reservation`.`area_id`) and (`dodoma`.`plot_assignment`.`areas_type_id` = `dodoma`.`plot_reservation`.`areas_type_id`) and (`dodoma`.`plot_assignment`.`block_id` = `dodoma`.`plot_reservation`.`block_id`) and (`dodoma`.`plot_assignment`.`plot_id` = `dodoma`.`plot_reservation`.`plot_id`) and (`dodoma`.`area_assignment`.`areas_type_id` = `dodoma`.`plot_reservation`.`areas_type_id`) and (`dodoma`.`area_assignment`.`area_id` = `dodoma`.`plot_reservation`.`area_id`)AND plot_reservation.status='$payment_details')");
    //dd($plot_assignments);
    // $user = UserDetail::findOrFail(Session::get('id'));
    // $areas = Area::all();
    // return view('reportsGenerator.reserved', compact('plot_assignments', 'user','areas','area_types','blocks'));
        //return view($land_uses);
    return json_encode($plot_assignments);
}
}
