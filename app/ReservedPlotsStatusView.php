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
}
