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
        $plot_id = $request->input('plot_id');
        $user_detail_id = Session('id');


        DB::beginTransaction();
        try {

            // get the ID of the transaction number
            $transaction_number_id = DB::SELECT('SELECT transaction_number_id FROM transaction_numbers WHERE transaction_number =:transaction_number AND status=0', ['transaction_number' => $transaction_number]);

            if (sizeof($transaction_number_id) == 1) {
                $transaction_number_id[0]->transaction_number_id;
            } else {
                // has already been used
                throw new \Exception('Transaction number already used');
            }


            $sql = "
                  UPDATE transaction_numbers SET
                  status = '1',
                  user_detail_id = Session('id'),
                  updated_at = NOW()
                  WHERE transaction_numbers.transaction_number_id = $transaction_number_id
                ";
            $affected = DB::update($sql);

            if ($affected == 0) {
                throw new \Exception('Failed in updating transaction number status');
            }


            $params['plot_id'] = $plot_id;
            $params['user_detail_id'] = $user_detail_id;

            $sql = 'UPDATE plot_reservation SET plot_reservation.status=1 WHERE plot_reservation.plot_id=:plot_id AND plot_reservation.user_detail_id=:user_detail_id';

            $affected = DB::update($sql, $params);

            if ($affected == 0) {
                throw new \Exception('Failed in updating plot reservation status');
            }

            flash()->success('Hongera, Umefanikiwa kulipia.');
            return redirect('/reservation');
        }catch(\Exception $e)
        {
            DB::rollback();
            flash()->error($e->getMessage());
            return redirect('/reservation');
        }
    }

    public function checkforTransactionNumberStatus($transaction_number)
    {
        // get the ID of the transaction number
        $transaction_number_id = DB::SELECT('SELECT transaction_number_id FROM transaction_numbers WHERE transaction_number =:transaction_number AND status=0', ['transaction_number' => $transaction_number]);

        if (sizeof($transaction_number_id) == 1) {
            // has not been used
            return $transaction_number_id[0]->transaction_number_id;
        } else {
            // has already been used
            return 0;
        }

    }

    public function updateTransactionNumbers($transaction_number_id, $user_detail_id)
    {

        $sql = "
                  UPDATE transaction_numbers SET
                  status = '1',
                  updated_at = NOW()
                  WHERE transaction_numbers.transaction_number_id = $transaction_number_id
                ";
        $affected = DB::update($sql);

        if ($affected == 1) {
            return 1;
        } else {
            return 0;
        }

    }

    public function updatePlotReservation($plot_id, $user_detail_id)
    {
        $params['plot_id'] = $plot_id;
        $params['user_detail_id'] = $user_detail_id;

        $sql = 'UPDATE plot_reservation SET plot_reservation.status=1 WHERE plot_reservation.plot_id=:plot_id AND plot_reservation.user_detail_id=:user_detail_id';

        $affected = DB::update($sql, $params);

        if ($affected == 1) {
            return 1;
        } else {
            return 0;
        }
    }
}
