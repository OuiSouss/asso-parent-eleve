<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('parent');
    }

    public function index() {
        $user = Auth::user();
        return view('welcome', ['user' => $user]);
    }

    public function orders() {
        return new Response('Orders');
    }

    public function orders_new() {
        return new Response('New order');
    }

    public function order($order_id) {
        return $order_id;
    }
}
