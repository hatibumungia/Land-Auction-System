<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaImage extends Model
{
    protected $fillable = ['area_id', 'file_name'];

    protected $primaryKey = 'id';

    protected $table = 'area_image';
}
