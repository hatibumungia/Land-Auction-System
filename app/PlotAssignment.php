<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlotAssignment extends Model
{
    protected $fillable = [
        'area_id',
        'areas_type_id',
        'block_id',
        'plot_no',
        'size'
    ];

    public $timestamps = false;

    protected $table = 'plot_assignment';

}
