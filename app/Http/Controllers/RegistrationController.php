<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\Welcome;
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
			'email' => 'required|email|unique:users',
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

		// send them a welcome email using Mail facade.
		\Mail::to($user)->send(new Welcome($user)); // pass through $user to the email template

		// redirect to the home page
		return redirect()->home();
	}
}
