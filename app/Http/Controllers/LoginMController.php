<?php

namespace App\Http\Controllers;

use App\loginM;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use validator;
use Session;

class LoginMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$Users = Db::table('logins')->where('id','>',0)->first();


        if(Session::get('state') == "true")
        {
            return redirect('/home');
        }
        else
        {
            return view('pages.login');
        }
    }


    public function check(Request $request)
    {
        $this->validate($request,[
            'username'=> 'required|alphaNum|min:3',
            'password'=> 'required|alphaNum|min:3'
        ]);
                 
        $check = DB::table('usersVW')->where("userName",$request->input('username'))->where('Password',$request->input('password'))->first();

        if(isset($check))
        {
            Session(['CurentUserId' => $check->id]);
            Session(['username' => $check->fullName]);
            Session(['UserType' => $check->Type]);
            Session(['state' => "true"]);
            return redirect('/home');
        }
        else
        {
            return back()->with('error', 'خطاء في البيانات ');
        }
    }

    public function successLogin()
    {

        if(Session::get('state') == "true")
        {
         return view('pages.home');
        }
        else
        {
            return redirect('/login');
        }
        //return redirect('/login');
    }

    public function logout(){
        Session(['state' => "false"]);
        return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\loginM  $loginM
     * @return \Illuminate\Http\Response
     */
    public function show(loginM $loginM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\loginM  $loginM
     * @return \Illuminate\Http\Response
     */
    public function edit(loginM $loginM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\loginM  $loginM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, loginM $loginM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\loginM  $loginM
     * @return \Illuminate\Http\Response
     */
    public function destroy(loginM $loginM)
    {
        //
    }
}
