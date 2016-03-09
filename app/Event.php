<?php namespace App;

use App\Custom\AutomaticUuidKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    use AutomaticUuidKey, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $table = 'events';

//    protected $dates = [            // to make sure dates are treated as instances of Carbon()
//        'deleted_at',
//        'uuid',
//        'start',
//        'finish',
//        'test_until',
//        'free_downloads_until',
//    ];

    protected $fillable = ['uuid', 'title','author_id' , 'type', 'description', 'location', 'url', 'timezone', 'start', 'finish', 'active'];
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
}