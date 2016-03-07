<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
	protected $dates = ['completed_at'];  // to make sure dates are treated as instances of Carbon()


    /**
     * Get the user that belongs to the activation.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
