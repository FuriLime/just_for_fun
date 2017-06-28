<?php

namespace App;

use App\Account;
use App\UserProfile;
// use Laravel\Cashier\Billable;  //User should not be billable
use App\Custom\AutomaticUuidKey;
use Illuminate\Auth\Authenticatable;        // not sure if user needs to "use Authenticable"
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Laravel\Cashier\Contracts\Billable as BillableContract; // should probably not implement BillableContract as Account is the billable entity 


class User extends EloquentUser  
{
    use Authenticatable, SoftDeletes, AutomaticUuidKey;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'last_login'];  // to make sure dates are treated as instances of Carbon()

    protected $fillable = [
    			'nick_name', 
    			'first_name', 
    			'last_name', 
    			'email',
                'password'
    		];


    public function activate()
    {
        return $this->hasOne('App\Activation');
    }
    /**
     * Get the user profile information associated with the user.
     */
    public function user_profile()
    {
        return $this->hasOne('App\UserProfile', 'user_id');
    }

    /**
     * The accounts that belong to the user. Containing all Account the user has access to.
     */
    public function accounts()
    {
        return $this->belongsToMany('App\Account')->withPivot('role_id')->withTimestamps();
    }


    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'account_user')->withPivot('role_id')->withTimestamps();
    }


    /**
     * The events that have been created by the user.
     */
    public function events_author()
    {
        return $this->hasMany('App\Event', 'author_id');
    }


    /**
     * The events where the user was the last editor of the vent.
     */
    public function events_last_editor()
    {
        return $this->hasMany('App\Event', 'editor_id');
    }


    /**
     * The events that the user has downloaded.
     */
    public function event_downloads()
    {
        return $this->hasMany('App\DownloadTransaction', 'downloading_user_id');
    }
}
