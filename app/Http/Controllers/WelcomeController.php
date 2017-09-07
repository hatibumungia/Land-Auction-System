<?php

namespace App\Http\Controllers;


use App\Http\Requests\Request;
use Auth;
use App\PlotsSelectionMainView;
use App\PlotAssignment;
use DB;


class WelcomeController extends Controller
{
    public function index()
    {

        $areas_locations = PlotsSelectionMainView::getAreas();

        $params = [];
        $areatypenames = [];

        if (isset($_GET['eneo'])) {
            $params['areaname'] = $_GET['eneo'];
            $areatypenames = PlotsSelectionMainView::getLandUses($params);
        }
        if (isset($_GET['matumizi-ya-ardhi'])) {
            $params['matumizi-ya-ardhi'] = $_GET['matumizi-ya-ardhi'];
        }

        $available_plots = PlotsSelectionMainView::getPlots($params);

        $area_maps = [];

        foreach ($available_plots as $available_plot) {

            $area_maps[] = [
                'area' => $available_plot->areaname,
                'map' => $available_plot->areafilename,
            ];
        }

        $area_maps = array_unique($area_maps, SORT_REGULAR);


        $block_maps = [];
        foreach ($available_plots as $available_plot) {
            $block_maps[] = [
                'block' => $available_plot->blockname,
                'map' => $available_plot->blockfilename,
            ];
        }

        $block_maps = array_unique($block_maps, SORT_REGULAR);

        return view('welcome-main', compact('areas_locations', 'available_plots', 'areatypenames', 'area_maps', 'block_maps'));

    }

    public function checkAuth()
    {
        if (Auth::guest()) {
            return 'guest';
        } else {
            return 'logged in';
        }
    }
}
