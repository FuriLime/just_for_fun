<?php

namespace App;

use App\Custom\AutomaticUuidKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use AutomaticUuidKey, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $table = 'events';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['uuid', 'title', 'type', 'description', 'location', 'url', 'timezone', 'start', 'finish', 'active'];
    
}
