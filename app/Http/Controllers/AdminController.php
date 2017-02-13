<?php

namespace App\Http\Controllers;

use App\Adherent;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function orders()
    {
        return view('admin.orders', ['page_title' => 'Liste des commandes']);
    }

    public function books()
    {
        return view('admin.books', ['page_title' => 'Liste des livres']);
    }
}
