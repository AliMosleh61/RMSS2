<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index()
    {
        $title = "Welcome to Index";
        return view('pages.index',compact('title'));
    }
    public function login()
    {
        $title = "Welcome to login";
        return view('pages.login');
    }
}
