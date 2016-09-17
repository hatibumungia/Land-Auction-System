<?php

namespace App\Http\Controllers\Reports;

use App\AllPlotsStatusReportView;
use App\ReservedPlotsStatusView;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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

    public function today()
    {
        $today_reservations = ReservedPlotsStatusView::getInATimeRange(Carbon::today(), Carbon::now());

        return view('reports.reservations.today', compact('today_reservations'));
    }

    public function today_print()
    {
        $filename = 'Report - ' . Carbon::now();
        Excel::create($filename, function ($excel) {

            $today_reservations = ReservedPlotsStatusView::getInATimeRange(Carbon::today(), Carbon::now());

            $excel->setTitle('Today Plot Reservations');
            $excel->setCreator('CDA Director')->setCompany('CDA');

            $excel->sheet('Sheet 1', function ($sheet) use ($today_reservations) {

                $sheet->fromModel($today_reservations);
            });

        })->download('xlsx');
    }
}
