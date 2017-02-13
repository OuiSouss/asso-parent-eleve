<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookReference extends Model
{
    public function section() {
        return $this->belongsTo('App\Section');
    }

    public function level() {
        return $this->belongsTo('App\Level');
    }

    public function subject() {
        return $this->belongsTo('App\Subject');
    }
}
