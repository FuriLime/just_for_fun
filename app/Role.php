<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cartalyst\Sentinel\Roles\EloquentRole;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model                // class Role extends EloquentRole //
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    

     /**
     * The users that have this role.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'account_user')->withPivot('role_id')->withTimestamps();
    }


     /**
     * The accounts that have this role.
     */
    public function accounts()
    {
        return $this->belongsToMany('App\Account', 'account_user')->withPivot('role_id')->withTimestamps();
    }


     /**
     * The permissions that this role has.
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }


}
