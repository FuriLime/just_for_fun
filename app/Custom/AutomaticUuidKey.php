<?php

namespace App\Custom;

use Uuid;

    /*
    |--------------------------------------------------------------------------
    | Automatic UUID Key Generation for all fields with name 'uuid'
    |--------------------------------------------------------------------------
    |
    | Setup is mainly taken from this suggestion:
    | http://garrettstjohn.com/article/using-uuids-laravel-eloquent-orm/
    |
    */


trait AutomaticUuidKey
{
    /**
     * Boot the Uuid trait for the model.
     *
     * @return void
     */
    public static function bootAutomaticUuidKey()
    {
        static::creating(function ($model) {
            // $model->incrementing = false;
            // $model->{$model->getKeyName()} = (string)Uuid::uuid4();
            $model->uuid = (string)Uuid::uuid4();
        });
    }

    /**
     * Get the casts array.
     *
     * @return array
     */
    public function getCasts()
    {
        return $this->casts;
    }
}

 