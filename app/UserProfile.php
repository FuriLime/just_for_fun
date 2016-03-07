<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $fillable = [
    			'timezone', 
    			'about', 
    			'image', 
    		];


    /**
     * Get the user that belongs to this user profile.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
