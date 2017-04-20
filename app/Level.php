<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $guarded = [];

    public function __toString()
    {
        return $this->name;
    }

    public function book_reference() {
        return $this->belongsTo('App\BookReference');
    }
}
