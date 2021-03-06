<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
	protected $dates = ['completed_at'];  // to make sure dates are treated as instances of Carbon()

    protected $table = 'activations';
    /**
     * Get the user that belongs to the activation.
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
        $user->verified = 1;
        $user->status = "Verified";
        $user->save();
    }

    public function isUserActivate($user_id)
    {
        $user = User::find($user_id);
        if ($user->verified){

            return true;
        }
    }
}
