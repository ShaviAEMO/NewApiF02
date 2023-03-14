<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    /**
     * TODO Relation
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
