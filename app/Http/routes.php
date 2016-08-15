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

Route::get('/',"WelcomeController@index");

Route::auth();

Route::get('/home', 'HomeController@index');

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
