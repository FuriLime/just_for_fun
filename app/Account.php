<?php

namespace App;

use Laravel\Cashier\Billable;
use App\Custom\AutomaticUuidKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use Billable, SoftDeletes, AutomaticUuidKey;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [            // to make sure dates are treated as instances of Carbon()
    	'deleted_at',
        'trial_ends_at',
    	'subscription_ends_at',
    	'free_downloads_until',
    	'free_events_until',
    ];

    protected $table = 'accounts';
    /**
     * Get the account profile information associated with the account.
     */
    public function account_profile()
    {
        return $this->hasOne('App\AccountProfile');
    }
    

    /**
     * Get the account type of the account.
     */
    public function account_type()
    {
        return $this->belongsTo('App\AccountType');
    }


    /**
     * The users that belong to the account. Containing all Users that have some sort of access to this account.
     */
    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('role_id')->withTimestamps();
    }


    /**
     * The roles that are used for this the account. Containing all roles users have.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'account_user')->withPivot('role_id')->withTimestamps();
    }


     /**
     * Get the events for the account.
     */
    public function events()
    {
        return $this->hasMany('App\Event');
    }


     /**
     * Get the invoices for the account.
     */
    public function invoices()
    {
        return $this->hasMany('App\Invoice');
    }


     /**
     * Get the features of the account.
     */
    public function features()
    {
        return $this->belongsToMany('App\Feature')->withPivot('valid_until', 'credit_type')->withTimestamps();
    }


    /**
     * Get the event credits for the account.
     */
    public function event_credits()
    {
        return $this->hasMany('App\EventCredit');
    }


    /**
     * Get the event transactions for the account.
     */
    public function event_transactions()
    {
        return $this->hasMany('App\EventTransaction');
    }


    /**
     * Get the download credits for the account.
     */
    public function download_credits()
    {
        return $this->hasMany('App\DownloadCredit');
    }


    /**
     * Get the download transactions for the account.
     */
    public function download_transactions()
    {
        return $this->hasMany('App\DownloadTransaction');
    }
}
