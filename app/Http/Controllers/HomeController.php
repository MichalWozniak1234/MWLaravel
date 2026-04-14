<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index() : mixed
    {
        return view("home.index");
    }
}
