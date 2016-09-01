<?php

namespace App\Http\Controllers;


use App\Http\Requests\PlotTransactionRequest;

use App\Http\Requests;
use App\PlotReservation;
use DB;

class PlotTransactionController extends Controller
{

    protected $params = [];

    protected $debug_msg = "";

    public function store(PlotTransactionRequest $request)
    {

        // Get all the passed parameters
        $this->params = $request->all();

        // capture the transaction number
        $transaction_number = $this->params['transaction_number'];

        // check if the transaction number exists and has not been used
        $status = DB::select('SELECT * FROM transaction_numbers WHERE transaction_number=:transaction_number AND status=0', ['transaction_number' => $transaction_number]);


        if (sizeof($status) == 1) {
            // both transaction number and status are ok

            //echo $this->updateTransactionNumbers();
            //echo $this->insertIntoPlotReservation();
            //echo $this->updatePlotAssignment();
            //check if all three operations are successfully
            if($this->updateTransactionNumbers() && $this->insertIntoPlotReservation() && $this->updatePlotAssignment()){
                // return 'all operations succeeded';
                

                flash()->success('All operations succeeded', compact('plot_reservations'));

                return redirect('/reservation');
            }else{
                return 'one of the operations failed';
            }

        } else {
            flash()->error('That transaction number has already been used or does not exist');

            return redirect('/reservation');
        }
    }

    public function updatePlotAssignment()
    {
        $area_id = $this->params['area_id'];
        $areas_type_id = $this->params['areas_type_id'];
        $block_id = $this->params['block_id'];
        $plot_id = $this->params['plot_id'];

        $sql = "
            UPDATE plot_assignment SET status = '1' 
            WHERE 
            plot_assignment.area_id = $area_id AND 
            plot_assignment.areas_type_id = $areas_type_id AND 
            plot_assignment.block_id = $block_id AND 
            plot_assignment.plot_id = $plot_id         
        ";

        $affected = DB::update($sql);

        if(sizeof($affected) == 1){
            $this->debug_msg += "updatePlotAssignment succeeded";
            return "true";
        }else{
            return "false";
        }
    }

    public function insertIntoPlotReservation()
    {

        PlotReservation::create([
            'area_id' => $this->params['area_id'],
            'areas_type_id' => $this->params['areas_type_id'],
            'block_id' => $this->params['block_id'],
            'plot_id' => $this->params['plot_id'],
            'user_detail_id' => $this->params['user_detail_id'],
            'deadline' => date('Y-m-d H:i:s', strtotime('+5 hours')),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $this->debug_msg += "insertIntoPlotReservation succeeded";

        return "true";
    }

    public function updateTransactionNumbers()
    {

        // get the ID of the transaction number

        $transaction_number_id = DB::SELECT('SELECT transaction_number_id FROM transaction_numbers WHERE transaction_number =:transaction_number AND status=0', ['transaction_number' => $this->params['transaction_number']]);

        if (sizeof($transaction_number_id) == 1) {
            $transaction_number_id = $transaction_number_id[0]->transaction_number_id;

            $sql = "
          UPDATE transaction_numbers SET 
          status = '1', 
          updated_at = date('Y-m-d H:i:s')
          WHERE transaction_numbers.transaction_number_id = $transaction_number_id
        ";

            $affected = DB::update($sql);

            // return "updateTransactionNumbers affected rows = " . $affected;
            if ($affected == 1) {
                $this->debug_msg += "updateTransactionNumbers succeeded";
                return "true";
            } else {
                return "false";
            }
        } else {
            return 'false';
        }
    }
}
