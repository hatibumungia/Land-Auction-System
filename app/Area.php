<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Area extends Model
{
    protected $fillable = ['name'];

    protected $table = "areas";

    protected $primaryKey = 'area_id';

}

