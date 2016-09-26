<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\UserCredential;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function change_password()
    {
    	return view('account.change_password');
    }

    public function process_change_password(ChangePasswordRequest $request){

    	$username = Session::get('phone_number');
    	$password = $request->input('old_password');
    	$new_password = $request->input('password');

    	$user_credential = UserCredential::checkLogin($username, $password);

    	if( ! $user_credential){
    		flash()->error('Umekosea neno la siri la zamani.');
    		return redirect('account/change-password');
    	}else{
    		$user_credential = UserCredential::whereUsername($username)->first();

    		$user_credential->password = Hash::make($new_password);

    		$user_credential->save();

    		flash()->success('Neno la siri limefanikiwa kubadilishwa.');
    		return redirect('reservation');
    	}

    }
}
