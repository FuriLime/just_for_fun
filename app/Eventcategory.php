<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventcategory extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'eventcategories';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description'];

}