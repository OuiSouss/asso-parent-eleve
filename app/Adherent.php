<?php

namespace App;

use App\Mail\AccountActivationEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Adherent extends Model
{
    protected $guarded = [];

    public function __toString()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

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

    public function sendAccountActivationEmail($token) {
        Mail::to($this->user->email)
            ->send(new AccountActivationEmail($token));
    }
}
