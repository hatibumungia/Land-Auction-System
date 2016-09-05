<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlotReservation extends Model
{
    protected $fillable = [
        'area_id',
        'areas_type_id',
        'block_id',
        'plot_id',
        'user_detail_id',
        'deadline',
        'created_at',
        'status',
    ];

    protected $table = "plot_reservation";

    public $timestamps = false;
}
