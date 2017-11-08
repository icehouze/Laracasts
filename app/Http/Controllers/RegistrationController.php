<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
	public function create()
	{
		return view('registration.create');
	}

	public function store(RegistrationForm $form)
	{
		// Form logic moved to Requests/RegistrationForm.php
		$form->persist();

		// can apply to any controller where is makes sense to flash a message on redirect
		// session('key', 'default')
		session()->flash('message', 'Thanks for much for signing up!');

		// redirect to the home page
		return redirect()->home();
	}
}
