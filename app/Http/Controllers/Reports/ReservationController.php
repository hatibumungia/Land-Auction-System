<?php

namespace App\Http\Controllers\Reports;

use App\ReservedPlotsStatusView;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers;
use PDF;

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

        $user = UserDetail::findOrFail(Session::get('id'));

        return view('reports.reservations.index', compact('reserved_plots_statuses', 'i', 'areas', 'blocks', 'landuses', 'user'));
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

        return $reservedPlotsStatusView->get([
            'plotno as Plot_No',
            'blockname as Block',
            'areaname as Area',
            'areatypename as Land_use',
            'fname as First_name',
            'mname as Middle_name',
            'lname as Last_name',
            'new_status as Status',
            'created_at as Reservation_date',
            'deadline as Due_date'
            ]);
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

    public function letters()
    {
        $letters = ReservedPlotsStatusView::where('registration_status', 1)->get();

        $i = 1;

        return view('reports/reservations/letters', compact('letters', 'i'));
    }

    public function print_letter_reports($areaid, $areatypeid, $blockid, $plotid)
    {
        $data = ReservedPlotsStatusView::where('areaid', $areaid)
                                    ->where('areatypeid', $areatypeid)
                                    ->where('blockid', $blockid)
                                    ->where('plotid', $plotid)
                                    ->get([
                                        'created_at',
                                        'photo',
                                        'fname as first_name',
                                        'mname as middle_name',
                                        'lname as last_name',
                                        'address',
                                        'region',
                                        'plotno as plot_no',
                                        'blockname as block',
                                        'areaname as location',
                                        'size',
                                        'total_price',
                                        'price'
                                        ]);                            

        $getPDF = PDF::loadView('reservations.print_preview', compact('data'));
        return $getPDF->stream('reservations.print_preview.pdf', ['Attachment' => 0], compact('data'));

    }
}
