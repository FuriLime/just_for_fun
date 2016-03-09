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
    protected $fillable = ['uuid', 'title', 'type', 'description', 'location', 'timezone', 'start', 'finish'];


    /**
     * Get the account that owns the event.
     */
    public function account()
    {
        return $this->belongsTo('App\Account');
    }


    /**
     * Get the author that has created the event.
     */
    public function author()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * Get the editor who last edited the event.
     */
    public function last_editor()
    {
        return $this->belongsTo('App\User', 'editor_id');
    }


    /**
     * Get the download transactions for the event.
     */
    public function download_transactions()
    {
        return $this->hasMany('App\DownloadTransaction');
    }


    /**
     * Get the event transactions for the event.
     */
    public function event_transactions()
    {
        return $this->hasMany('App\EventTransaction');
    }
    
}
