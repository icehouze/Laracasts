<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
	// created own custom model with protected $guarded = []; and extend that instead of Eloquent.
    protected $guarded = [];
}
