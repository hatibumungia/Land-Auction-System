<?php

namespace App\Http\Controllers\Reports;

use App\ReservedPlotsStatusView;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ReservationController extends Controller
{
    public function index(Request $request)
    {

        $areas = DB::table('areas')->orderBy('name')->get(); 
        $blocks = DB::table('blocks')->orderBy('name')->get();
        $landuses = DB::table('area_types')->orderBy('name')->get();

        $reservedPlotsStatusView = new ReservedPlotsStatusView();
        $reservedPlotsStatusView = $reservedPlotsStatusView->newQuery();

        $reserved_plots_statuses = $this->search($reservedPlotsStatusView, $request);

        $i = 1;

        if (isset($_POST['export_excel_button'])) {
            PrintController::index($reserved_plots_statuses, 'xlsx');
        }
        if (isset($_POST['export_pdf_button'])) {
            PrintController::index($reserved_plots_statuses, 'pdf');
        }        

        return view('reports.reservations.index', compact('reserved_plots_statuses', 'i', 'areas', 'blocks', 'landuses'));
    }

    public function search($reservedPlotsStatusView, $request)
    {
        if ($request->has('plotno') && $request->has('plotno') != '') {
            $reservedPlotsStatusView->where('plotno', $request->input('plotno'));
        }
        if ($request->has('area') && $request->has('area') != '') {
            $reservedPlotsStatusView->orWhere('areaname', $request->input('area'));
        }
        if ($request->has('block') && $request->has('block') != '') {
            $reservedPlotsStatusView->orWhere('blockname', $request->input('block'));
        }
        if ($request->has('landuse') && $request->has('landuse') != '') {
            $reservedPlotsStatusView->orWhere('areatypename', $request->input('landuse'));
        }

        return $reservedPlotsStatusView->get();
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
