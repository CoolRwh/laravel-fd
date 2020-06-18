<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends BaserController
{
    //
    public function index()
    {
        return view('web.home.home');
    }
}
