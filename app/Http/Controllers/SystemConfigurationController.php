<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use validator;
use Session;
use Yajra\Datatables\Datatables;

class SystemConfigurationController extends Controller
{
    
    public function index()
    {
        if(Session::get('state') == "true")
        {
           return view('pages.SystemConfiguration');
        }
        else
        {
            return redirect('/login');
        }
    }
}
