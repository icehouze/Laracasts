<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
	public function create()
	{
		return view('registration.create');
	}

	public function store(Request $request)
	{
		// validate the form
		$this->validate(request(), [
			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed' // for password_confirmation
		]);

		// create and save the user
		$user = User::create([
			'name' => request('name'),
			'email' => request('email'),
			'password' => bcrypt(request('password'))
		]);

		// sign them in
		auth()->login($user);
		// or
		// \Auth::login();

		// redirect to the home page
		return redirect()->home();
	}
}
