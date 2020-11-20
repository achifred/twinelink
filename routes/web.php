<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
 
Route::get('/login','UserController@create')->name('login');
Route::get('/register','UserController@signup');
Route::get('/reset','UserController@resetForm');

Route::post('/resetpassword','UserController@resetPassword');
Route::get('/resetlink','UserController@resetLink')->name('resetlink');
Route::post('/enqueries','EnqueryController@Enqueries');



Route::post('/login','UserController@login');
Route::post('/register','UserController@register');
Route::get('/me','AdminController@create');
Route::post('/me','AdminController@login');
Route::middleware('isadmin')->get('/signout','AdminController@signout');

Route::group(['middleware'=>'auth','prefix'=>'admin' ], function () {
    Route::get('/', 'LinkController@index');
    
    Route::post('/links','LinkController@store');
    Route::get('/links','LinkController@create');
    Route::get('/links/{link}','LinkController@edit');
    Route::post('/links/{link}','LinkController@update');
    Route::delete('/links/{link}','LinkController@destroy');
    Route::get('/settings','UserController@setting' );
    Route::post('/settings','UserController@update' );
    Route::get('/logout','UserController@signout');
    Route::get('/account','UserController@account');
    Route::post('/password/{id}','UserController@changePassword');
    Route::post('/acount/picture/{user_id}','UserController@updatePicture');
    Route::get('/account/delete/{user_id}','UserController@deleteAccount');
    Route::get('/link/stats/{link_id}','VisitController@stats');
    Route::get('/stats','LinkImpressionController@stats');
    Route::get('/url','MedialurlController@create');
    Route::post('/url/{url_id}','MedialurlController@updateUrl');
    Route::get('/url/edit/{id}','MedialurlController@edit');
    Route::get('/url/delete/{id}','MedialurlController@destroy');
    Route::get('/url/tittle/{id}','MedialTittleController@edit');
    Route::post('/url/tittle/{id}','MedialTittleController@updateTittle');
    Route::get('/url/tittle/delete/{id}','MedialTittleController@deleteTittle');
    Route::get('/url/stats/{url_id}','MedialurlVisitController@stats');
});

Route::group(['middleware'=>'isadmin','prefix' => 'dashboard'], function () {
    Route::get('/','DashboardController@index');
    Route::get('/users','DashboardController@allUsers');
    Route::get('/themes','ColorController@themes');
    Route::post('/themes','ColorController@store');
    Route::get('/themes/create','ColorController@create');
    Route::get('/themes/{id}','ColorController@edit');
    Route::post('/themes/update/{id}','ColorController@update');
    Route::get('/icons','IconController@index');
    Route::post('/icons', 'IconController@store');
    Route::get('/icons/create','IconController@create');
    Route::get('/icons/{id}','IconController@edit');
    Route::post('/icons/{id}','IconController@update');

});
Route::post('/visit/{link}','VisitController@store');
Route::get('/{user}/{tittle}','MedialurlController@Urls');
Route::get('/{user}','UserController@show');



