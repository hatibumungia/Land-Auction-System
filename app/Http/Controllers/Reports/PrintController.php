<?php

namespace App\Http\Controllers\Reports;

use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class PrintController extends Controller
{

    public function print_letter($data)
    {
        $getPDF = PDF::loadView('reservations.print_preview', compact('data'));
        return $getPDF->stream('reservations.print_preview.pdf', ['Attachment' => 0], compact('data'));
    }

    public static function index($model, $format, $headersLabel)
    {
        $filename = 'Report - ' . Carbon::now();
        Excel::create($filename, function ($excel) use ($model, $headersLabel) {

            $excel->setTitle('Today Plot Reservations');
            $excel->setCreator('CDA Director')->setCompany('CDA');

            $excel->sheet('Plot Reservations', function ($sheet) use ($model, $headersLabel) {
                $sheet->fromModel($model, null, 'A1', false, false);
                $sheet->prependRow($headersLabel);
            });

        })->download($format);
    }

}
