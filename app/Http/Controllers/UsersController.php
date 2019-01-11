<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use validator;
use Session;
use Yajra\Datatables\Datatables;
use app\loginM;
class UsersController extends Controller
{
   
    //method to open usersManagement
    public function index()
    {
        if(Session::get('state') == "true")
        {
           return view('pages.usersManagement');
        }
        else
        {
            return redirect('/login');
        }
    }



     //method to open AddUser
     public function OpenAddUser()
     {
         if(Session::get('state') == "true")
         {
            $usersTypes = DB::table("masterdetails")->where('MasterID',1)->get();

            return view('pages.addUser',compact("usersTypes"));
         }
         else
         {
             return redirect('/login');
         }
     }



     public function AddUser(Request $request){

        $this->validate($request, [
            'empname'=> "bail|required|alpha_spaces|min:3|max:191",
            'username'=> 'bail|required|min:3|max:191|alphaNum',
            'password'=> 'bail|required|min:3|max:191|confirmed|alphaNum'
            
        ]);
        
       $id = 0;
       $id = DB::table('users')->insertGetId([
           'fullName' => $request->input('empname'),
           'userName' =>  $request->input('username'),
           'Password' =>  $request->input('password'),
           'Roll' =>  $request->input('UserType'),
           'userState' =>  $request->input('userstatus'),
           'DataEntry' =>  Session::get('CurentUserId'),
           "created_at" =>  \Carbon\Carbon::now()
       ]);
        
       if($id > 0 )
        {
            return redirect('/usersManagement')->with('success', 'تم اضافة المستخدم بنجاح ');
        }
        else
        {
            return redirect('/usersManagement')->with('error', 'خطاء في عملية الاضافة ')->withInput();
        }
     }


         //method to open editUser
         public function OpenEditUser()
         {
             if(Session::get('state') == "true")
             {
                $usersTypes = DB::table("masterdetails")->where('MasterID',1)->get();
                //$user =DB::table("users")->where('id',Session::get('id'))->first();
                $user =DB::table("users")->where('id',Session::get('id'))->first();
                return view('pages.editeUser',compact(["usersTypes","user"]));
             }
             else
             {
                 return redirect('/login');
             }
         }

         
     public function EditeUser(Request $request){

        $this->validate($request, [
            'invisible'=> "required",
            'empname'=> "bail|required|alpha_spaces|min:3|max:191",
            'username'=> 'bail|required|min:3|max:191|alphaNum',
            'password'=> 'bail|required|min:3|max:191|confirmed|alphaNum'
            
        ]);
        
        
       $id = 0;
       $id = DB::table('users')->where('id',$request->input('invisible'))->update([
                           'fullName' => $request->input('empname'),
                           'userName' =>  $request->input('username'),
                           'Password' =>  $request->input('password'),
                           'Roll' =>  $request->input('UserType'),
                           'userState' =>  $request->input('userstatus'),
                           'DataEntry' =>  Session::get('CurentUserId'),
                           "updated_at" =>  \Carbon\Carbon::now()
                      ]);

       if($id > 0 )
        {
            return redirect('/usersManagement')->with('success', 'تم تعديل المستخدم بنجاح ' );
        }
        else
        {
            return redirect('/usersManagement')->with('error', 'خطاء في عملية التعديل ')->withInput();
        }
     }

     public function DeleteUser(){

        // $this->validate($request, [
        //     'invisible'=> "required",
        //     'empname'=> "bail|required|alpha_spaces|min:3|max:191",
        //     'username'=> 'bail|required|min:3|max:191|alphaNum',
        //     'password'=> 'bail|required|min:3|max:191|confirmed|alphaNum'
            
        // ]);
        
        
       $id = 0;
       $id = DB::table('users')->where('id',Session::get('id'))->update([
                          'userState' =>  "2",
                           "updated_at" =>  \Carbon\Carbon::now()
                      ]);

       if($id > 0 )
        {
            return redirect('/usersManagement')->with('success', 'تم حذف المستخدم بنجاح ' );
        }
        else
        {
            return redirect('/usersManagement')->with('error', 'خطاء في عملية الحذف ')->withInput();
        }
     }

    //method to fill the users table
    public function getData(){
        $users = DB::table('usersVW')->get();
            
        
        return Datatables::of($users)
            ->addColumn('action', function ($users) {
                return '<a  title="تعديل" href="/editUser/'.$users->id.'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i> </a> 
                <a   title="حذف" href="/deleteUser/'.$users->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>' ;
            })->make(true);
            //->removeColumn('password')

    }


    public function check(Request $request)
    {
        $this->validate($request,[
            'username'=> 'required|alphaNum|min:3',
            'password'=> 'required|alphaNum|min:3'
        ]);

        $user_data =array("username" => $request->input('username'), "password" =>$request->input('password') ); 
          
        
        $check = DB::table('usersVW')->where("userName",$request->input('username'))->where('Password',$request->input('password'))->first();

        if(isset($check))
        {
            Session(['username' => $check->fullName]);
            Session(['UserType' => $check->Roll]);
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


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(loginM $loginM)
    {
        //
    }

 
    public function edit(loginM $loginM)
    {
        //
    }

 
    public function update(Request $request, loginM $loginM)
    {
        //
    }


    public function destroy(loginM $loginM)
    {
        //
    }

    /**************************** Views 
     * 
     create view usersVW
     SELECT u1.id,u1.fullName,u1.userName,u1.Password,md.Detail as "Type",md2.Detail as "userState",u2.userName as "dataEntry",u1.created_at,u1.updated_at 
     AS
     join users as u2 
     from users as u1 
     join masterdetails as md 
     on u1.DataEntry = u2.id 
     join masterdetails as md2 
     on u1.Roll = md.id and md.MasterID = 1    
     on u1.userState = md2.id and md2.MasterID = 2 
     
     
     Onther Quary
     
      CREATE VIEW `usersvw` 
      AS select `u1`.`id` AS `id`,`u1`.`fullName` AS `fullName`,
      `u1`.`userName` AS `userName`,`u1`.`Password` AS `Password`
      ,`md`.`Detail` AS `Type`,`md2`.`Detail` AS `userState`,
      `u2`.`userName` AS `dataEntry`,
      `u1`.`created_at` AS `created_at`,
      `u1`.`updated_at` 
      AS `updated_at` from (((`users` `u1` join `users` `u2` on((`u1`.`DataEntry` = `u2`.`id`))) join `masterdetails` `md` on(((`u1`.`Roll` = `md`.`id`) and (`md`.`MasterID` = 1)))) join `masterdetails` `md2` on(((`u1`.`userState` = `md2`.`id`) and (`md2`.`MasterID` = 2))))
     

     */

}
