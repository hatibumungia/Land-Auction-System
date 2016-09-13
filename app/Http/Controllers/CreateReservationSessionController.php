<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CreateReservationSessionController extends Controller
{
    public function index()
    {

        session([
            'temp_reservation_areaId' => $_POST['areaid'],
            'temp_reservation_area_type_id' => $_POST['areatypeid'],
            'temp_reservation_block_id' => $_POST['blockid'],
            'temp_reservation_plot_id' => $_POST['plotid'],
        ]);

        return redirect('/reservation');
    }
}
