<?php

namespace App\Http\Controllers;

use App\Area;
use App\Plot;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class WelcomeController extends Controller
{
	public function index() {
		$areas = Area::all();
		$plots = Plot::all();

		return view('welcome',
			compact('areas'));
	}
}
