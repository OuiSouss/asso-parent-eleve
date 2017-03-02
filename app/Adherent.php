<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adherent extends Model
{
    protected $guarded = [];

    public function getActiveAccountAttribute() {
        return true;
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function contribution() {
        return $this->belongsTo('App\Contribution');
    }
}
