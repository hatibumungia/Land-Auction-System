<?php

namespace App\Http\Controllers;


use App\Http\Requests\Request;
use Auth;
use App\PlotsSelectionMainView;


class WelcomeController extends Controller
{
    public function index()
    {

        $areas_locations = PlotsSelectionMainView::getAreas();

        $params = [];
        $areatypenames = [];

        if(isset($_GET['eneo'])){
            $params['areaname'] = $_GET['eneo'];
            $areatypenames = PlotsSelectionMainView::getLandUses($params);
        }
        if(isset($_GET['matumizi-ya-ardhi'])){
            $params['matumizi-ya-ardhi'] = $_GET['matumizi-ya-ardhi'];
        }

        $available_plots = PlotsSelectionMainView::getPlots($params);

        return view('welcome-main', compact('areas_locations','available_plots', 'areatypenames'));

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
