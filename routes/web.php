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
});
*/

	Route::get('/',['as'=>'index','uses'=>'PostController@index']);

Route::get('/create',['as'=>'create','uses'=>'PostController@create']);
Route::post('/store',['as'=>'store','uses'=>'PostController@store']);
Route::get('/posts/delete/{id}',['as'=>'destroy','uses'=>'PostController@destroy']);
Route::get('/posts/show/{id}',['as'=>'show','uses'=>'PostController@show']);
Route::get('/posts/edit/{id}',['as'=>'edit','uses'=>'PostController@edit']);
Route::post('/posts/update/{id}',['as'=>'update','uses'=>'PostController@update']);
Route::get('/itemlist',['as'=>'manageItemAjax','uses'=>'ItemAjaxController@manageItemAjax']);
Route::post('/itemlist/iteminsert',['as'=>'itemInsertPost','uses'=>'ItemAjaxController@itemInsertPost']);
Route::get('/itemlist/itemedit',['as'=>'itemEditPost','uses'=>'ItemAjaxController@itemEditPost']);
Route::any('/itemlist/itemupdate/{id}',['as'=>'itemUpdatePost','uses'=>'ItemAjaxController@itemUpdatePost']);
Route::any('/itemlist/itemdelete/{id}',['as'=>'itemDeletePost','uses'=>'ItemAjaxController@itemDeletePost']);

//===============================image thumnail upload

Route::get('intervention-resizeImage',['as'=>'intervention.getresizeimage','uses'=>'FileController@getResizeImage']);
Route::get('/thumbcreate',['as'=>'thumbcreate','uses'=>'FileController@thumbcreate']);
Route::post('/thumbstore',['as'=>'thumbstore','uses'=>'FileController@postResizeImage']);
Route::get('/thumshow/{id}',['as'=>'thumshow','uses'=>'FileController@postViewImage']);

//==================================

Route::get('/mainlog', [
	'as'=> 'mainlog',
	'uses'=> 'AuthController@mainlog'
]);


Route::post('/login', [
	'as'=> 'login',
	'uses'=> 'AuthController@login'
]);





Route::group(['middleware'=>['prevent-back-history']],function(){
	Route::get('/logout', ['as'=> 'logout','uses'=>'StaffController@logout']);
	Route::get('/staff/main', ['as'=> 'staff','uses'=> 'StaffController@staff']);
});





