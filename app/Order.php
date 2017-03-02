<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function getPriceAttribute() {

    }

    public function adherent() {
        return $this->belongsTo('App\Adherent');
    }

    public function books() {
        return $this->hasMany('App\Book');
    }
}
