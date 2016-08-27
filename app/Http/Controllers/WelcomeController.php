<?php

namespace App\Http\Controllers;

use App\Area;
use App\AreaType;
use App\Block;
use App\Plot;
use Auth;


class WelcomeController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        $area_types = AreaType::all();
        $blocks = Block::all();
        $plots = Plot::all();

        return view('welcome', compact('areas', 'area_types', 'blocks', 'plots'));
    }

    public function checkAuth()
    {
        if(Auth::guest())
        {
            return 'guest';
        }
        else
        {
            return 'logged in';
        }
    }
}
