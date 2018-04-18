<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Routing\Controller;

class AuthenticationController extends Controller
{
    //

public function authenticate(Request $request) {

	if(Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password'),'user_level' => 'Administrator']))
	{
		
		return redirect('/dashboard');
		
	}elseif(Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password'),'user_level' => 'Supervisor']))
	{
		return redirect('/dashboard');

	}elseif(Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password'),'user_level' => 'Agent']))
	{
		return redirect('/dashboard');

	}else{
		return redirect('/')->with('error', 'Invalid Credentials!');
	}

}

public function logout(){

	Auth::logout();

	return redirect('/');

}


}
