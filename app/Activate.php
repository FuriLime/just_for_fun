<?php namespace App;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\SoftDeletes;
use Cartalyst\Sentinel\Users\EloquentUser;

class Activate extends Model {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'activations';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	/**
	* To allow soft deletes
	*/
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function isUserHasCode($user_id, $activation_code)
    {
        return (boolean)$this->where('user_id',$user_id)->where('code',$activation_code)->count();
    }

    public function activateUser($user_id)
    {
        $user = User::find($user_id);
		$user->isActivate = 1;
		$user->save();
    }

    public function isUserActivate($user_id)
    {
        $user = User::find($user_id);
		if ($user->isActivate){
			return true;
		}
    }

}
