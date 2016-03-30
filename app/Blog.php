<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Blog extends Model {

    use SoftDeletes;

//    protected $dates = ['deleted_at'];
//
//    protected $sluggable = [
//        'build_from' => 'title',
//        'save_to'    => 'slug',
//    ];
//
//    protected $table = 'blogs';
//
//    protected $guarded  = array('id');
//
//    public function comments()
//    {
//        return $this->hasMany('App\BlogComment');
//    }
//    public function category()
//    {
//        return $this->belongsTo('App\BlogCategory');
//    }
//    public function author()
//    {
//        return $this->belongsTo('App\User', 'user_id');
//    }
//    public function getBlogcategoryAttribute()
//    {
//        return $this->category->lists('id');
//    }
}