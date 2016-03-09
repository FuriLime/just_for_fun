<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Usergroup extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usergroups';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description'];

}