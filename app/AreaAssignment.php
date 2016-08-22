<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaAssignment extends Model
{
    protected  $fillable = [
        'area_id',
        'areas_type_id',
        'price'
    ];

    protected  $table = 'area_assignment';

    protected  $primaryKey = 'area_id';

    public $timestamps = false;
}
