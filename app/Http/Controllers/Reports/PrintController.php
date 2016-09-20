<?php

namespace App\Http\Controllers\Reports;

use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PrintController extends Controller
{
    public static function index($model, $format)
    {

        $filename = 'Report - ' . Carbon::now();
        Excel::create($filename, function ($excel) use ($model) {

            $excel->setTitle('Today Plot Reservations');
            $excel->setCreator('CDA Director')->setCompany('CDA');

            $excel->sheet('Plot Reservations', function ($sheet) use ($model) {
                $sheet->fromModel($model);
            });

        })->download($format);
    }
}
