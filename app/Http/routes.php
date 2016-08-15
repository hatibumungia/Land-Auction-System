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

	Route::post('/plots/new', function(Request $request) {

		$validator = Validator::make($request->all(), [
			'plot_no' => 'required|max:255',
			'size' => 'required|max:255',
			'location' => 'required|max:255',
			'type' => 'required|max:255',
			'price' => 'required|max:255',
		]);

		if ($validator->fails()) {
			return back()
				->withInput()
				->withErrors($validator);
		}

		$plot = new \App\Plot;
		$plot->plot_no = $request->plot_no;
		$plot->size = $request->size;
		$plot->location = $request->location;
		$plot->type = $request->type;
		$plot->price = $request->price;
		$plot->save();

		return redirect('/home');
	});
});
