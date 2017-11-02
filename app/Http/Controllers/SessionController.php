<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
	// so that signed in users will not see the login page (adding a guest filter)
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'destroy']);
	}

	public function create()
	{
		return view('sessions.create');
	}

	public function store()
	{
		// attempt to authenticate the user with auth helper function and attempt method
		// attempt method will compare credentials and if they match will automatically sign the user in.
		if (! auth()->attempt(request(['email', 'password']))) {
			// if not, display error message & redirect back
			return back()->withErrors([
				'message' => 'Your credentials did not match. Please try again.'
			]);
		}

		// redirect to home page
		return redirect()->home();
	}

	// logout
	public function destroy()
	{
		auth()->logout();

		return redirect()->home();
	}
}
