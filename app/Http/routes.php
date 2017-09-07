<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\AreaType;

Route::get('/', "WelcomeController@index");

// Check if a user is logged in
Route::get('/welcome/checkAuth', 'WelcomeController@checkAuth');

// Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/areas/{id}/types/', function ($id) {
    $area_types = AreaType::all();
    return view('welcome', compact('area_types'));
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/plots/new', function () {
        return view('auth.plots.new');
    });

    Route::post('/plots/new', function (\Illuminate\Http\Request $request) {

        // TODO: make a $validator;
        // TODO: if it fails, return back()->withInput()->withErrors($validator)

        $plot = new \App\Plot;
        $plot->plot_no = $request->plot_no;
        $plot->size = $request->size;
        $plot->price = $request->price;

        $faker = Faker\Factory::create();
        $plot->area_id = $faker->numberBetween(1, 4);
        $plot->area_type_id = $faker->numberBetween(1, 4);

        $plot->save();

        return redirect('/home');
    });
});


Route::get('/search/getAreaType', 'SearchController@getAreaType');
Route::get('/search/getBlock', 'SearchController@getBlock');
Route::get('/search/getPlot', 'SearchController@getPlot');

Route::get('/search', 'SearchController@index');

Route::get('/search/performSearch', 'SearchController@performSearch');

Route::get('/search/getReservationSummaryNames', 'SearchController@getReservationSummaryNames');

Route::post('/admin/publish/report','ReportGeneratorController@publishExcel');


$router->group([
    'namespace' => 'Admin',
    'middleware' => ['applicant', 'staff'],
], function () {
    Route::get('/admin/dashboard', 'DashboardController@index');
    Route::resource('/admin/locations', 'AreaController');

    /*Route::resource('/admin/location-assignments', 'AreaAssignmentController');*/
    Route::get('/admin/location-assignments', 'AreaAssignmentController@index');
    Route::post('/admin/location-assignments', 'AreaAssignmentController@store');
    Route::get('/admin/location-assignments/create', 'AreaAssignmentController@create');
    Route::delete('/admin/location-assignments/{location}/{land_use}', 'AreaAssignmentController@destroy');
    Route::patch('/admin/location-assignments/{location}/{land_use}', 'AreaAssignmentController@update');
    Route::get('/admin/location-assignments/{location}/{land_use}/{price}/edit', 'AreaAssignmentController@edit');



    Route::resource('/admin/land-uses', 'AreaTypeController');
    Route::resource('/admin/blocks', 'BlockController');

    Route::get('/admin/plot-assignments', 'PlotAssignmentController@index');
    Route::post('/admin/plot-assignments', 'PlotAssignmentController@store');
    Route::get('/admin/plot-assignments/create', 'PlotAssignmentController@create');
    Route::get('/plot-assignments/download-sample', 'PlotAssignmentController@downloadSample');
    Route::post('/admin/plot-assignments/{area_id}/{areas_type_id}/{block_id}/{plot_id}/publish','PlotAssignmentController@published');
    Route::post('/admin/plot-assignments/publishAll','PlotAssignmentController@publishAll');

    Route::post('/admin/plot-assignments/unpublishAll','PlotAssignmentController@unpublishAll');

    Route::post('/admin/plot-assignments/check','PlotAssignmentController@check');
    Route::get('/admin/plot-assignments/publishblock','PlotAssignmentController@publishblock');

    Route::resource('/admin/block-assignments', 'BlockAssignmentController');
    Route::get('/admin/location-assignments/getLandUse', 'AreaAssignmentController@getLandUse');

    Route::resource('/admin/location-images', 'AreaImageController');
});


// Routes for ajax requests
$router->group([
    'namespace' => 'Admin',
    'middleware' => 'applicant',
], function () {
    Route::get('/admin/ajax/locationAssignmentsGetLandUse', 'AjaxController@locationAssignmentsGetLandUse');
    Route::get('/admin/ajax/GetLandUse', 'AjaxController@GetLandUse');
    Route::get('/admin/ajax/GetLndUse', 'ReportController@GetLandUse');
    Route::get('/admin/ajax/LandUse', 'ReportController@GetLandUse');
    Route::get('/admin/ajax/GetBlok', 'ReportController@GetBlock');
    Route::get('/admin/ajax/GetSze', 'ReportController@GetSize');
    Route::get('/admin/ajax/GetBlock', 'AjaxController@GetBlock');
    Route::get('/admin/ajax/published', 'ReportController@published');
    Route::get('/admin/ajax/trial', 'UnreservedController@trial');
    Route::get('/admin/ajax/trial2', 'UnreservedController@trial2');
    Route::get('/admin/ajax/triall', 'UnreservedController@triall');
    Route::get('/admin/ajax/GetSize', 'AjaxController@GetSize');
    Route::get('/admin/ajax/payment', 'ReservedController@payment');
    Route::get('/admin/ajax/blockAssignmentsGetLandUse', 'AjaxController@blockAssignmentsGetLandUse');
    Route::get('/admin/ajax/blockAssignmentGetLandUse', 'ReportController@blockAssignmentsGetLandUse');
    Route::get('/admin/ajax/blockAssignmentsGetBlock', 'AjaxController@blockAssignmentsGetBlock');
    Route::get('/admin/ajax/blockAssignmentGetBlock', 'ReportController@blockAssignmentsGetBlock');
    Route::get('/admin/ajax/plotAssignmentsGetLandUses', 'AjaxController@plotAssignmentsGetLandUses');
    Route::get('/admin/ajax/plotAssignmentGetLandUses', 'ReportController@plotAssignmentsGetLandUses');
    Route::get('/admin/ajax/plotAssignmentsGetBlock', 'AjaxController@plotAssignmentsGetBlock');
    Route::get('/admin/ajax/plotAssignmentGetBlock', 'ReportController@plotAssignmentsGetBlock');

    //publish
    Route::get('/admin/ajax/PublishlocationAssignmentsGetLandUse', 'PulishAjaxController@locationAssignmentsGetLandUse');
    Route::get('/admin/ajax/PublishblockAssignmentsGetLandUse', 'PulishAjaxController@blockAssignmentsGetLandUse');
    Route::get('/admin/ajax/PublishblockAssignmentsGetBlock', 'PulishAjaxController@blockAssignmentsGetBlock');
    Route::get('/admin/ajax/PublishplotAssignmentsGetLandUses', 'PulishAjaxController@plotAssignmentsGetLandUses');
    Route::get('/admin/ajax/PublishplotAssignmentsGetBlock', 'PulishAjaxController@plotAssignmentsGetBlock');
});

/*$router->group([
    'middleware' => 'applicant'
], function() {*/
    Route::get('/reservation', 'ReservationController@index');
    Route::get('/reservation/print-preview/{plot_no}', 'ReservationController@print_preview');
    Route::get('/reservation/logout', 'ReservationController@logout');

    Route::get('/reservation/complete-registration', 'ReservationController@completeRegistration');
    Route::patch('/reservation/processCompleteRegistration', 'ReservationController@processCompleteRegistration');

    Route::post('/reservation/processCompleteRegistration', 'ReservationController@processCompleteRegistration');
    
    Route::post('/applicants/auth/login', 'ApplicantsController@processLogin');

    Route::get('/applicants/register', 'ApplicantsController@register');
    Route::post('/applicants/auth/register', 'ApplicantsController@processRegister');

    Route::post('/plot_transactions', 'PlotTransactionController@store');

    Route::post('/createreservationsessioncontroller', 'CreateReservationSessionController@index'); 
 Route::get('/reportsGenerator/published','ReportGeneratorController@published');   
 Route::get('/reportsGenerator/published/reserved','ReportGeneratorController@reserved');   
 Route::get('/reportsGenerator/published/unreserved','ReportGeneratorController@unreserved'); 
 Route::post('/admin/paid/excel','ReportGeneratorController@paidExcel'); 
 Route::post('/admin/reserved/excel','ReportGeneratorController@reservedExcel'); 

/*});*/

Route::get('/applicants/login', 'ApplicantsController@login');

$router->group([
    'namespace' => 'Reports',
    'middleware' => ['applicant', 'staff'],
], function () {
    Route::get('/reports/reservations', 'ReservationController@index');
    Route::post('/reports/reservations', 'ReservationController@index');
    Route::get('/reports/reservations/plots/{from}/to/{to}', 'ReservationController@plots');
    Route::get('/reports/reservations/plots/{from}/to/{to}/{format}/print', 'ReservationController@plots_print')
        ->where(['format' => 'xlsx|pdf']);



    Route::get('/reports/clients', 'ClientController@index');
    Route::post('/reports/clients', 'ClientController@index');
    Route::get('/reports/clients/{id}', 'ClientController@show');


});

$router->group([
    'namespace' => 'Admin',
    'middleware' => ['applicant', 'staff'],
], function () {
    Route::resource('admin/staff', 'UserController');
    Route::post('admin/staff/attachRole', 'UserController@attachRole');

    Route::resource('admin/roles', 'RoleController');
    Route::post('admin/roles/attachPermission', 'RoleController@attachPermission');

    Route::resource('admin/permissions', 'PermissionController');
});

$router->group([
    'namespace' => 'Admin',
    'middleware' => 'applicant'
], function () {
    Route::post('/admin/plot-assignments/publish', 'PlotAssignmentController@publish');
});

Route::get('account/change-password', 'AccountController@change_password');

Route::post('account/process_change_password', 'AccountController@process_change_password');

$router->group([
    'namespace' => 'Reports',
    'middleware' => ['applicant', 'staff'],
], function() {
    Route::get('reports/reservations/letters', 'ReservationController@letters');
    Route::get('reports/reservations/print-letter-reports/{areaid}/{areatypeid}/{blockid}/{plotid}', 'ReservationController@print_letter_reports');
});