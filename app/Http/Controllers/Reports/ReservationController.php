<?php

namespace App\Http\Controllers\Reports;

use App\AllPlotsStatusReportView;
use App\ReservedPlotsStatusView;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function index()
    {
        
        $all_plots_statuses = AllPlotsStatusReportView::paginate(15);

        $unreserved_plots = AllPlotsStatusReportView::getUnreserved();

        $reserved_plots_statuses =  ReservedPlotsStatusView::paginate(15);
        
        return view('reports.reservations.index', compact('all_plots_statuses', 'unreserved_plots', 'reserved_plots_statuses'));
    }
}
