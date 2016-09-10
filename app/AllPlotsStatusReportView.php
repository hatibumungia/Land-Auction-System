<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AllPlotsStatusReportView extends Model
{
    protected $table = 'all_plots_status_report_view';

    public static function getAll()
    {
        return DB::select('select * from all_plots_status_report_view');
    }

    public static function getUnreserved()
    {
        return DB::table('all_plots_status_report_view')->where('status', 0)->paginate(15);
    }
}
