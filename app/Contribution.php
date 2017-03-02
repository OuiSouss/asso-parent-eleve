<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    public function __toString()
    {
        return $this->name;
    }
}
