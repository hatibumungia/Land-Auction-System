<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PlotsSelectionMainView extends Model
{
    protected $table = "plots_selection_main_view";

    public static function getAreas()
    {
        return DB::select('SELECT areaname, COUNT(*) as available_plots FROM plots_selection_main_view where status=0 GROUP BY areaname');
    }

    public static function getPlots($params)
    {
        if (isset($params['areaname']) && isset($params['matumizi-ya-ardhi'])) {
            return DB::table('plots_selection_main_view')
                ->where('areaname', $params['areaname'])->where('areatypename', $params['matumizi-ya-ardhi'])->paginate(50);
        }
        if (isset($params['areaname'])) {
            return DB::table('plots_selection_main_view')->where('areaname', '=', $params['areaname'])->paginate(50);
        }
        return PlotsSelectionMainView::paginate(50);

    }

    public static function getLandUses($params)
    {
        return DB::select('SELECT areatypename, COUNT(*) as available_area_types_names FROM plots_selection_main_view where status=0 AND areaname=:areaname GROUP BY areatypename', $params);
    }
}
