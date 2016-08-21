<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaType extends Model
{
    protected $fillable = ['name'];

    protected $table = 'area_types';

    protected $primaryKey = 'areas_type_id';
}
