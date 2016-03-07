<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountProfile extends Model
{
    /**
     * Get the account that owns the account_profile.
     */
    public function account()
    {
        return $this->belongsTo('App\Account');
    }
}
