<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;

class ReservationController extends Controller
{
    public function index()
    {
        return view('reservations.index');
    }
}
