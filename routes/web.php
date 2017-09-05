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
});*/

Route::get('/',['as'=>'index','uses'=>'PostController@index']);
Route::get('/create',['as'=>'create','uses'=>'PostController@create']);
Route::post('/store',['as'=>'store','uses'=>'PostController@store']);
Route::get('/posts/delete/{id}',['as'=>'destroy','uses'=>'PostController@destroy']);
Route::get('/posts/show/{id}',['as'=>'show','uses'=>'PostController@show']);
Route::get('/posts/edit/{id}',['as'=>'edit','uses'=>'PostController@edit']);
Route::post('/posts/update/{id}',['as'=>'update','uses'=>'PostController@update']);
Route::get('/itemlist',['as'=>'manageItemAjax','uses'=>'ItemAjaxController@manageItemAjax']);
Route::post('/itemlist/iteminsert',['as'=>'itemInsertPost','uses'=>'ItemAjaxController@itemInsertPost']);



