<?php

namespace App\Http\Controllers\Reports;

use App\AllPlotsStatusReportView;
use App\ReservedPlotsStatusView;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class ReservationController extends Controller
{
    public function index()
    {

        $all_plots_statuses = AllPlotsStatusReportView::paginate(50);

        $unreserved_plots = AllPlotsStatusReportView::getUnreserved();

        $reserved_plots_statuses = ReservedPlotsStatusView::paginate(50);

        $user = UserDetail::findOrFail(Session::get('id'));

        return view('reports.reservations.index', compact('all_plots_statuses', 'unreserved_plots', 'reserved_plots_statuses', 'user'));
    }

    public function plots($from, $to)
    {
        $today_reservations = ReservedPlotsStatusView::getInATimeRange($from, $to);

        return view('reports.reservations.plots', compact('today_reservations'));
    }

    public function plots_print($from, $to, $format = 'xlsx')
    {
        $plots_reservations = ReservedPlotsStatusView::getInATimeRange($from, $to);

        $filename = 'Report - ' . Carbon::now();
        Excel::create($filename, function ($excel) use ($plots_reservations) {

            $excel->setTitle('Today Plot Reservations');
            $excel->setCreator('CDA Director')->setCompany('CDA');

            $excel->sheet('Plot Reservations', function ($sheet) use ($plots_reservations) {
                $sheet->fromModel($plots_reservations);
            });

        })->download($format);
    }
}
