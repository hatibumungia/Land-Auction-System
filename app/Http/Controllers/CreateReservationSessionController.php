<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CreateReservationSessionController extends Controller
{
    public function index()
    {
        session([
            'temp_reservation_areaId' => $_GET['areaId'],
            'temp_reservation_area_type_id' => $_GET['area_type_id'],
            'temp_reservation_block_id' => $_GET['block_id'],
            'temp_reservation_plot_id' => $_GET['plot_id'],
        ]);

        return redirect('/reservation');
    }
}
