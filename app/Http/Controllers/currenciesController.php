<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use validator;
use Session;
use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;

class currenciesController extends Controller
{
    //
    public function index()
    {
        if(Session::get('state') == "true")
        {
           return view('pages.currencies');
        }
        else
        {
            return redirect('/login');
        }
    }
    public function gatCurrencyData(){
        
        $Currencies = DB::table('currencies')->get();
        return Datatables::of($Currencies)
            ->addColumn('action', function ($Currencies) {
                return '<a  title="تعديل" href="/editCurrency/'.$Currencies->id.'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i> </a> 
                <a   title="حذف" href="/deleteCurrency/'.$Currencies->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>' ;
            })->make(true);
       

    }
    //method to add currency
    public function AddCurrency(Request $request){

        $this->validate($request, [
            'CurrencyName'=> "bail|required|alpha_spaces|min:3|max:191",
            'CurrencySign'=> 'bail|required|min:1|max:5|alphaDash',
            'CurrencyExchange'=> 'bail|required|min:3|max:191|alphaNum'            
        ]);
        $num =0;
        if($request->input('CurrencyType') == 1){$num = 1;}else{$num=2;}
          
       $id = 0;
       $id = DB::table('currencies')->insertGetId([
           'Name' => $request->input('CurrencyName'),
           'sign' =>  $request->input('CurrencySign'),
           'Type' =>  $num,
           'Exchange' =>  $request->input('CurrencyExchange'),
           'State' =>  $request->input('Currencystatus'),
           'DataEntry' =>  Session::get('CurentUserId'),
           "created_at" =>  \Carbon\Carbon::now()
       ]);
        
       if($id > 0 )
        {
            return redirect('/currencies')->with('success', 'تم اضافة المستخدم بنجاح ');
        }
        else
        {
            return redirect('/currencies')->with('error', 'خطاء في عملية الاضافة ')->withInput();
        }
     }

}