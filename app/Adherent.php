<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adherent extends Model
{
    protected $guarded = [];

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
