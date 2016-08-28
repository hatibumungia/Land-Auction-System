<?php

namespace App\Http\Controllers;


use App\Http\Requests\RegisterAnApplicantRequest;

use App\Http\Requests;

use App\UserDetail;

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

    public function store(RegisterAnApplicantRequest $request)
    {

        UserDetail::create([
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'email_address' => $request->input('email_address'),
            'phone_number' => $request->input('phone_number'),
        ]);

        flash()->success('Registered successfully. Now login');

        return redirect('applicants/login');
    }
}
