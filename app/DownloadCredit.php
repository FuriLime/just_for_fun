<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DownloadCredit extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'valid_until'];	// to make sure dates are treated as instances of Carbon()


    /**
     * Get the download transaction for the download credit.
     */
    public function download_transaction()
    {
        return $this->hasOne('App\DownloadTransaction');
    }


     /**
     * Get the account that owns the download credits.
     */
    public function account()
    {
        return $this->belongsTo('App\Account');
    }
}
