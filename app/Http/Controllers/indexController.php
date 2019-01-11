<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\Datatables;

class indexController extends Controller
{

    public function index(){
        
      

        return view('pages.test');
    }



    public function store(Request $request){

        $request->validate([
            'empname'=>'bail|required|string|min:12|max:50',
            'username'=> 'bail|required|min:4|max:12',
            'password' => 'bail|required|confirmed',
          ]);



    }

    public function getData(){
        $users = DB::table('Users')->get();
            

        return Datatables::of($users)
            ->addColumn('action', function ($users) {
                return '<a data-toggle="modal" data-target="#updateUserModel" title="تعديل" href="#edit-'.$users->id.'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i> </a>  
                <a  data-toggle="modal" data-target="#deleteUserModel" title="حذف" href="#edit-'.$users->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>' ;
            })->make(true);
            //->removeColumn('password')

    }
    
}
