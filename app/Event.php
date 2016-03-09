<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['uuid', 'title', 'user_id', 'type', 'description', 'location', 'url', 'timezone', 'start', 'finish', 'active'];

}