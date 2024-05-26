<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

public function index()
{
    $role = auth()->check() ? auth()->user()->role : null;
    return view('home', ['role' => $role]);
}

}