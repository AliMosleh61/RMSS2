<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use validator;
use Session;
use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;

class userConfigurationController extends Controller
{
    //
    public function index()
    {
        if(Session::get('state') == "true")
        {
           return view('pages.userConfiguration');
        }
        else
        {
            return redirect('/login');
        }
    }
    
    public function gatUserTypeData(){
        
        $usertypes = DB::table('masterdetailsvw')->where('MasterID',1)->get();  
        return Datatables::of($usertypes)
            ->addColumn('action', function ($usertypes) {
                return '<a  title="تعديل" href="/editUserType/'.$usertypes->id.'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i> </a> 
                <a   title="حذف" href="/deleteUserType/'.$usertypes->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>' ;
            })->make(true);
            //->removeColumn('password')

    }
    public function AddUserTypes(Request $request){

        $this->validate($request, [
            'typeName'=> "bail|required|alpha_spaces|min:3|max:191",
            
        ]);
        $id = 0;
    

    $NewID= DB::table('masterdetails')->where('MasterID',1)->orderBy('id','desc')->first();

    $num = $NewID->id+1;


    if(isset($NewID)){

      
        $id = DB::table('masterdetails')->insert([
            'id' => $num,
            'MasterID' => 1,
            'Detail' =>  $request->input('typeName'),
            'State' =>  $request->input('typeStatus'),
        ]);

        

    }

    if(isset($id) )
        {
            return redirect('/userConfiguration')->with('success', 'تم اضافة نوع المستخدم بنجاح '.$num);
        }
        else
        {
            return redirect('/userConfiguration')->with('error', 'خطاء في عملية الاضافة '.$num)->withInput();
        }
        
       
     }
     public function OpenEditUserType()
     {
         if(Session::get('state') == "true")
         {
            //$usersTypesState = DB::table("masterdetails")->where('MasterID',2)->get();
            $userType =DB::table("masterdetails")->where('id',Session::get('id'))->Where('MasterID',1)->first();
            return view('pages.editUserType',compact(["userType"]));
         }
         else
         {
             return redirect('/login');
         }
     }
     public function EditeUser(Request $request){

        $this->validate($request, [
            'invisible'=> "required",
            'typeName'=> "bail|required|alpha_spaces|min:3|max:191"
          
            
        ]);
        
        
       $id = 0;
       $id = DB::table('masterdetails')->where('id',$request->input('invisible'))->Where('MasterID' ,1)->update([
                         'Detail' =>  $request->input('typeName'),
                         'State' =>  $request->input('typeStatus'),
                                       ]);

       if($id > 0 )
        {
            return redirect('/userConfiguration')->with('success', 'تم تعديل النوع بنجاح ' );
        }
        else
        {
            return redirect('/userConfiguration')->with('error', 'خطاء في عملية التعديل ')->withInput();
        }
     }
     public function DeleteUser(){

       $id = 0;
       $id = DB::table('masterdetails')->where('id',Session::get('id'))->update([
                          'State' =>  "2"
                    
                      ]);

       if($id > 0 )
        {
            return redirect('/userConfiguration')->with('success', 'تم حذف النوع بنجاح ' );
        }
        else
        {
            return redirect('/userConfiguration')->with('error', 'خطاء في عملية الحذف ')->withInput();
        }
     }


}

/*
UsersTypesVW Code

create view UsersTypeVW
AS
select id,Detail from masterdetails where MasterID=1
----------------------------------------------------------

statusvw code

create view StatusVW
AS
select id,Detail from masterdetails where MasterID=2
----------------------------------------------------------------
masterdetailsvw code

create VIEW masterdetailsvw
AS
SELECT md.id,md.MasterID,md.Detail,st.Detail as State
from masterdetails as md
join statusvw as st
on md.State = st.id

*/
