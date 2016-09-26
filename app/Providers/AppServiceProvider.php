<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use App\UserDetail;
use App\Area;
use App\AreaAssignment;
use App\AreaImage;
use App\AreaType;
use App\Block;
use App\BlockAssignment;
use App\PlotAssignment;
use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $user = UserDetail::findOrFail(1/*Session::get('id')*/);

        view()->share([
            'user' => $user,
            'totalLocations' => Area::count(),
            'totalLandUses' => AreaType::count(),
            'totalBlocks' => Block::count(),
            'totalPrices' => AreaAssignment::count(),
            'totalPlots' => PlotAssignment::count(),
            'totalAreaMaps' => AreaImage::count(),
            'totalBlockMaps' => BlockAssignment::count(),
            'totalStaff' => DB::table('role_user')->count(),
            'totalRoles' => DB::table('roles')->count(),
            'totalPermissions' => DB::table('permissions')->count()
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register(\Laracasts\Generators\GeneratorsServiceProvider::class);
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
