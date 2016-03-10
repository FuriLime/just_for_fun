<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


     /**
     * Get the accounts of the feature.
     */
    public function accounts()
    {
        return $this->belongsToMany('App\Account')->withPivot('valid_until', 'credit_type')->withTimestamps();
    }
}
