<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index() {
        $user = Auth::user();
        return redirect()->route('login');
    }
}
