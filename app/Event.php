<?php

namespace App;

use App\Custom\AutomaticUuidKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rolies106\EloquentSluggable\SluggableInterface;
use Rolies106\EloquentSluggable\SluggableTrait;

class Event extends Model implements SluggableInterface
{
    use AutomaticUuidKey,SluggableTrait, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
//    protected $dates = [            // to make sure dates are treated as instances of Carbon()
//        'deleted_at',
//    	'start',
//    	'finish',
//    	'test_until',
//    	'free_downloads_until',
//    ];

    protected $fillable = ['uuid', 'title', 'description', 'location', 'Country', 'City','State','Street', 'timezone', 'start', 'finish'];
    /**
     * Get the account that owns the event.
     */
    protected $sluggable = [
        'build_from'        => 'title',
        'save_to'           => 'readable_url',
    ];


    public function account()
    {
        return $this->belongsTo('App\Account');
    }


    /**
     * Get the author that has created the event.
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
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
