<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasswordController extends Controller
{
    public function create($token)
    {
        $passwordBroker = app('auth.password.broker');

        // Check if token is valid
        $token_infos = DB::table('password_resets')
            ->where('token', '=', $token)
            ->first();

        if ($token_infos) {
            //$user = User::where('email', $token_infos->email)->first();
            return view('auth.passwords.create', compact('token_infos'));
        } else {
            return response('Invalid token');
        }
    }
}
