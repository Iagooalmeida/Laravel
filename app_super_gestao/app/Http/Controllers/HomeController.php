<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // echo 'Acessou o controller de home';
        // return view('app.home.index');
        return view('app.home');
    }
}
