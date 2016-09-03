<?php

namespace App\Http\Controllers;


use App\Http\Requests\PlotTransactionRequest;

use App\Http\Requests;
use App\PlotReservation;
use DB;

class PlotTransactionController extends Controller
{

    public function store(PlotTransactionRequest $request)
    {
        $transaction_number = $request->input('transaction_number');
        $plot_no = $request->input('plot_no');
        $user_detail_id = Session('id');

        // check if the transaction number exists and has not been used
        $operation1 = $this->updateTransactionNumbers($transaction_number, $user_detail_id);

        // update the plot_reservation
        $operation2 = $this->updatePlotReservation($plot_no, $user_detail_id);

        if ($operation1 == 1 && $operation2 == 1) {
            flash()->success('You have successfully paid for the plot');
            return redirect('/reservation');
        }

    }

    public function updateTransactionNumbers($transaction_number, $user_detail_id)
    {

        // get the ID of the transaction number
        $transaction_number_id = DB::SELECT('SELECT transaction_number_id FROM transaction_numbers WHERE transaction_number =:transaction_number AND status=0', ['transaction_number' => $transaction_number]);

        if (sizeof($transaction_number_id) == 1) {
            $transaction_number_id = $transaction_number_id[0]->transaction_number_id;

            $sql = "
          UPDATE transaction_numbers SET 
          status = '1',
          user_detail_id = $user_detail_id, 
          updated_at = date('Y-m-d H:i:s')
          WHERE transaction_numbers.transaction_number_id = $transaction_number_id
        ";
        }

        $affected = DB::update($sql);

        if (sizeof($affected) == 1) {
            return 1;
        } else {
            return 0;
        }

    }

    public function updatePlotReservation($plot_id, $user_detail_id)
    {
        $params['plot_id'] = $plot_id;
        $params['user_detail_id'] = $user_detail_id;

        $sql = 'UPDATE plot_reservation SET plot_reservation.status="1" WHERE plot_reservation.plot_id=:plot_id AND plot_reservation.user_detail_id=:user_detail_id';

        $affected = DB::update($sql, $params);

        return $affected;
    }
}
