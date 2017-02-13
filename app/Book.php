<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function order() {
        return $this->belongsTo('App\Order');
    }

    public function book_reference() {
        return $this->belongsTo('App\BookReference');
    }
}
