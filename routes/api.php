<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/links/{user_id}','LinkController@userLinks');
    Route::post('/links','LinkController@store');
    Route::delete('/links/{link}','LinkController@destroy');
    Route::get('/links/show/{link}','LinkController@edit');
    Route::put('/links/{link}','LinkController@update');
    Route::put('/account/{user_id}','UserController@update');
    Route::get('/themes','ColorController@index');
    Route::put('/themes/{id}/{user_id}','ColorController@changeTheme');
   
    
    Route::get('/link/visit/stats/{link}/{user_id}','VisitController@linkStatistics');
    Route::get('/link/stats/{user_id}','LinkImpressionController@pageStats');
    Route::get('/icons/social','IconController@socialIcons');
    Route::post('/user/update/banner/{user_id}','UserController@updateBanner');
});
Route::post('/media/url','MedialurlController@addUrl');
Route::post('/media/url/update/{url_id}','MedialurlController@updateUrl');
Route::delete('/media/url/delete/{url_id}','MedialurlController@destroy');
Route::get('/media/user/urls/{user_id}','MedialurlController@allUrls');
Route::get('/media/urls/{user_id}','MedialurlController@userUrls');
Route::get('/media/links/{medialtittle_id}','MedialurlController@Urls');
Route::post('/media/tittle','MedialTittleController@addTittle');
Route::post('/media/tittle/update/{id}','MedialTittleController@updateTittle');
Route::delete('/media/tittle/delete/{id}', 'MedialTittleController@deleteTittle');


Route::put('/acount/picture/{user_id}','UserController@updatePicture');
Route::post('/resetmail','UserController@resetMail');
Route::post('/visit/{link_id}', 'VisitController@store');




