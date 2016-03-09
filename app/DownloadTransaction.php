<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DownloadTransaction extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    /**
     * Get the event that created this download transaction.
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }


    /**
     * Get the user who was involved the download transaction.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'downloading_user_id');
    }


    /**
     * Get the download credit that was involved in the download transaction.
     */
    public function download_credit()
    {
        return $this->belongsTo('App\DownloadCredit');
    }


    /**
     * Get the account that belongs to this download transaction (via the event).
     */
    public function account()
    {
        return $this->belongsTo('App\Account');
    }
}
