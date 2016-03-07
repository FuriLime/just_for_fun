<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountFeature extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['valid_until'];			// to make sure dates are treated as instances of Carbon()
}
