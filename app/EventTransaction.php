<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventTransaction extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    /**
     * Get the event that created this event transaction.
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }


    /**
     * Get the user who was involved in the event transaction.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'creating_user_id');
    }


    /**
     * Get the event credit that was involved in the event transaction.
     */
    public function event_credit()
    {
        return $this->belongsTo('App\EventCredit');
    }


    /**
     * Get the account that belongs to this event transaction (via the event).
     */
    public function account()
    {
        return $this->belongsTo('App\Account');
    }  
}
