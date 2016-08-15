<?php

namespace App\Http\Controllers;

use App\Plot;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class WelcomeController extends Controller
{

    /*public function index() {
        $areas = array(
            array(
                'name'=>'Kisasa',
                'id'=>'1',
            ),
            array(
                'name'=>'Nkuhungu Chama',
                'id'=>'2',
            ),
            array(
                'name'=>'Maili Mbili',
                'id'=>'3',
            )
        );

        $areaTypes = array(
            array(
                'name'=>'Residential',
                'id'=>'1',
            ),
            array(
                'name'=>'Institutional',
                'id'=>'2',
            ),
            array(
                'name'=>'Commercial',
                'id'=>'3',
            ),
            array(
                'name'=>'Residential/Commercial',
                'id'=>'4',
            )
        );

        $blocks = array(
            array(
                'name'=>'A',
                'id'=>'1',
            ),
            array(
                'name'=>'B',
                'id'=>'2',
            ),
            array(
                'name'=>'C',
                'id'=>'3',
            ),
            array(
                'name'=>'D',
                'id'=>'4',
            ),
            array(
                'name'=>'E',
                'id'=>'4',
            )
        );

        $data = array(
            'areas'=>$areas,
            'area_types'=>$areaTypes,
            'blocks'=>$blocks);
        return view('layouts.welcome')->with('data', $data);
    }

    public function firstpage() {
        return view('layouts.welcome');
    }*/

	public function index() {
		$plots = Plot::all();
		return view('welcome', compact('plots'));
	}
}
