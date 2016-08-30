<?php

namespace App\Http\Controllers;


use App\Http\Requests\PlotTransactionRequest;

use App\Http\Requests;
use App\PlotReservation;

class PlotTransactionController extends Controller
{
    public function store(PlotTransactionRequest $request)
    {
        PlotReservation::create([
            'area_id' => $request->input('area_id'),
            'areas_type_id' => $request->input('areas_type_id'),
            'block_id' => $request->input('block_id'),
            'plot_id' => $request->input('plot_id'),
            'user_detail_id' => $request->input('user_detail_id'),
            'deadline' => date('Y-m-d H:i:s', strtotime('+5 hours')),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        echo 'Success';
    }
}
