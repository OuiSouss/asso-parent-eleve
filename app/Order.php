<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function getPriceAttribute() {
        $price = 0;
        foreach ($this->books as $book) {
            $price += $book->actualised_price;
        }
        return $price;
    }

    public function adherent() {
        return $this->belongsTo('App\Adherent');
    }

    public function books() {
        return $this->belongsToMany('App\Book');
    }
}
