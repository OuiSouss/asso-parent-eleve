<?php

namespace App\Http\Controllers;

use App\Mail\Reminder;
use App\User;
use App\Voiture;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Mail;
use Faker;
use YahooWeather;

class TestController extends Controller
{
    public function index() {
        Mail::to(User::find(1))
            ->bcc(User::find(3))
            ->send(new Reminder);

        return 'mail envoyé';
    }

    public function antoine() {
        $voitures = Voiture::where('value', '<', 500)->get();

        $array = [1, 9, 6, 4];
        //return view('test.antoine', ['tab' => $array]);
        return $voitures;
        //return redirect()->route('test.index');
    }
}
