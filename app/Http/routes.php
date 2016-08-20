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

Route::get('/',"WelcomeController@index");

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/areas/{id}/types/', function($id) {
	$area_types = AreaType::all();
	return view('welcome', compact('area_types'));
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/plots/new', function() {
		return view('auth.plots.new');
	});

	Route::post('/plots/new', function(\Illuminate\Http\Request $request) {

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
