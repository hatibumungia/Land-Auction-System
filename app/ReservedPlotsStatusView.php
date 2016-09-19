<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReservedPlotsStatusView extends Model
{
    protected $table = 'reserved_plots_status_view';

    public static function getClientReservations($userdetailid)
    {
        return DB::table('reserved_plots_status_view')->where('userdetailid', $userdetailid)->get();
    }

    public static function getInATimeRange($min_time, $max_time)
    {
        return ReservedPlotsStatusView::where('created_at', '>=', $min_time)
            ->where('created_at', '<=', $max_time)
            ->get([
                'plotno',
                'areaname',
                'areatypename',
                'blockname',
                'size',
                'price',
                'fname',
                'mname',
                'lname',
                'created_at',
                'status'
            ]);
    }
}
