<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'plot_no', 'size', 'area_id', 'area_type_id', 'price'
	];
}
