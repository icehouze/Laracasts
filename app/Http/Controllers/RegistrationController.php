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
		// validate the form
		// Moved to Requests/RegistrationForm.php

		// create and save the user
		// Moved to Requests/RegistrationForm.php

		// sign them in
		// Moved to Requests/RegistrationForm.php

		// send them a welcome email using Mail facade.
		// Moved to Requests/RegistrationForm.php

		$form->persist();

		// redirect to the home page
		return redirect()->home();
	}
}
