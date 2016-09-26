<?php

namespace App\Http\Controllers;


use App\Http\Requests\RegisterAnApplicantRequest;
use App\Http\Requests\LoginAnApplicantRequest;

use App\Http\Requests;

use App\UserDetail;
use App\UserCredential;
use DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Hash;

class ApplicantsController extends Controller
{

    public function register()
    {
        return view('applicants/register');
    }

    public function login()
    {
        return view('applicants/login');
    }

    public function processRegister(RegisterAnApplicantRequest $request)
    {

        UserDetail::create([
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'email_address' => $request->input('email_address'),
            'phone_number' => $request->input('phone_number'),
            'password' => Hash::make($request->input('password')),
        ]);

        flash()->success('Umefanikiwa kujisajili. Sasa ingia');

        return redirect('applicants/login');
    }

    public function processLogin(LoginAnApplicantRequest $request)
    {

        $user = UserCredential::checkLogin($request->input('username'), $request->input('password'));

        if (!$user) {
            flash()->error('Umekosea namba ya simu au neno la siri.');

            return redirect('/applicants/login');

        } else {
            $user_details = DB::select("SELECT * FROM user_details WHERE user_details.user_detail_id=$user->id");
            $first_name = $user_details[0]->first_name;
            $last_name = $user_details[0]->last_name;
            $phone_number = $user_details[0]->phone_number;

            $request->session()->put('id', $user->id);
            $request->session()->put('username', $first_name . " " . $last_name);
            $request->session()->put('phone_number', $phone_number);

            return redirect('/reservation');
        }
    }


}
