<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'invoice_date'];      // to make sure dates are treated as instances of Carbon()


    /**
     * Get the account that belongs to the invoice.
     */
    public function account()
    {
        return $this->belongsTo('App\Account');
    }
}
