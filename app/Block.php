<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = ['name'];

    protected $table = 'blocks';

    protected $primaryKey = 'block_id';
}
