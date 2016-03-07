<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventCredit extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'valid_until'];   // to make sure dates are treated as instances of Carbon()


    /**
     * Get the event transaction for the event credit.
     */
    public function event_transaction()
    {
        return $this->hasOne('App\EventTransaction');
    }


     /**
     * Get the account that owns the event credits.
     */
    public function account()
    {
        return $this->belongsTo('App\Account');
    }


}
