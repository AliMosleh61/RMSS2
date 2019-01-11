<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
   return view('welcome');
  // return 'hello world';
   
});

Route::get('/about', function () {
    return view('pages.about');
   // return 'hello world';
    
 });*/


 //Route::get('/', 'loginMController@index');
 //Route::get('/', 'indexController@index');

 Route::get('/test', 'indexController@index');

//Route::get('get-data-my-datatables', ['as'=>'get.UsersData','uses'=>'indexController@getData']);
 //Route::get('/data', 'indexController@getData');
 //Route::get('/login', 'pagesController@login');
 
 // login routs
 Route::get('/login', 'LoginMController@index');
 Route::post('/login/check', 'LoginMController@check');
 Route::get('/home','LoginMController@successLogin');
 Route::get('/logout','LoginMController@logout');

 
//users management routs
Route::get('/usersManagement', 'UsersController@index');
Route::get('get-Users-data', ['as'=>'get.UsersData','uses'=>'UsersController@getData']);
Route::get('/AddUser', 'UsersController@OpenAddUser');
Route::post('/AddUser/add', 'UsersController@AddUser');
Route::get('/editUser/{id}', function ($id) {
  return redirect('/editUser')->with('id',$id);
});
Route::get("/editUser",'UsersController@OpenEditUser');
Route::post('/editUser/edit', 'UsersController@EditeUser');
Route::get('/deleteUser/{id}', function ($id) {
  return redirect('/deleteUser')->with('id',$id);
});
Route::get("/deleteUser",'UsersController@DeleteUser');

//userConfiguration Route 
Route::get('/userConfiguration','userConfigurationController@index');
Route::get('get-UsersTypes-data', ['as'=>'get.UserTypeData','uses'=>'userConfigurationController@gatUserTypeData']);
Route::post('/AddUserType','userConfigurationController@AddUserTypes');
Route::get('/editUserType/{id}', function ($id) {
  return redirect('/editUserType')->with('id',$id);
});
Route::get("/editUserType",'userConfigurationController@OpenEditUserType');
Route::post('/editUserType/edit', 'userConfigurationController@EditeUser');
Route::get('/deleteUserType/{id}', function ($id) {
  return redirect('/deleteUserType')->with('id',$id);
});
Route::get("/deleteUserType",'userConfigurationController@DeleteUser');







//System Configuration routs
Route::get('/SystemConfiguration', 'SystemConfigurationController@index');
// Route::get('get-data-my-datatables', ['as'=>'get.UsersData','uses'=>'UsersController@getData']);
// Route::get('/AddUser', 'UsersController@OpenAddUser');
// Route::post('/AddUser/add', 'UsersController@AddUser');
// Route::get('/editUser/{id}', function ($id) {
//   return redirect('/editUser')->with('id',$id);
// });
// Route::get("/editUser",'UsersController@OpenEditUser');
// Route::post('/editUser/edit', 'UsersController@EditeUser');
// Route::get('/deleteUser/{id}', function ($id) {
//   return redirect('/deleteUser')->with('id',$id);
// });
// Route::get("/deleteUser",'UsersController@DeleteUser');

// Currencies  Route
Route::get('/currencies','currenciesController@index');
Route::get('get-currencies-data', ['as'=>'get.currencies','uses'=>'currenciesController@gatCurrencyData']);
Route::post('/AddCurrency','currenciesController@AddCurrency');



 // Start page Routs
 Route::get('/', 'startController@index');

 

//Auth::routes();
