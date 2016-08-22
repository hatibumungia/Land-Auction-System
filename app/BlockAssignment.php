<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockAssignment extends Model
{
    protected  $fillable = [
        'area_id',
        'areas_type_id',
        'block_id',
        'file_name'
    ];

    protected  $table = 'block_assignment';

    protected  $primaryKey = 'area_id';

    public $timestamps = false;
}
