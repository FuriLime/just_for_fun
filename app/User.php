<?php namespace App;
use App\Account;
use App\UserProfile;
use App\Custom\AutomaticUuidKey;
use Illuminate\Auth\Authenticatable;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends EloquentUser {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
//	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	* To allow soft deletes
	*/
	use SoftDeletes;

    protected $dates = ['deleted_at'];


    public function activate()
	{
		return $this->hasOne('App\Activate');
	}

    public function user_profile()
    {
        return $this->hasOne('App\UserProfile');
    }

    public function accounts()
    {
        return $this->belongsToMany('App\Account')->withPivot('role_id')->withTimestamps();
    }

}
