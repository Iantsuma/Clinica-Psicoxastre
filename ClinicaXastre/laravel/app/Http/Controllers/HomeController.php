<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

public function index()
{
    return view('landpage');
}

public function home()
{
    $role = auth()->check() ? auth()->user()->role : null;
    return view('home', ['role' => $role]);
}

}