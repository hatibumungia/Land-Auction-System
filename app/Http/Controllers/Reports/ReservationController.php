<?php

namespace App\Http\Controllers\Reports;

use App\AllPlotsStatusReportView;
use App\ReservedPlotsStatusView;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserDetail;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    public function index()
    {
        
        $all_plots_statuses = AllPlotsStatusReportView::paginate(50);

        $unreserved_plots = AllPlotsStatusReportView::getUnreserved();

        $reserved_plots_statuses =  ReservedPlotsStatusView::paginate(50);

        $user = UserDetail::findOrFail(Session::get('id'));
        
        return view('reports.reservations.index', compact('all_plots_statuses', 'unreserved_plots', 'reserved_plots_statuses', 'user'));
    }
}
