<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    
	/**
    * The roles that have this permission.
    */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }


    /**
    * The account_types that have this permission.
    */
    public function account_types()
    {
        return $this->belongsToMany('App\AccountType');
    }
}
