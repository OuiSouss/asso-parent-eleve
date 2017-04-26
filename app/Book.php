<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['state','available', 'book_reference_id'];

    public function getActualisedPriceAttribute() {
        return $this->book_reference->initial_price * (1 - ($this->state-1)/10);
    }

    public function getStateTextAttribute() {
        switch ($this->state) {
            default:
                return 'Text';
                break;
        }
    }

    public function order() {
        return $this->belongsToMany('App\Order');
    }

    public function book_reference() {
        return $this->belongsTo('App\BookReference');
    }
}
