<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use DB;
class ItemAjaxController extends Controller{
   public function manageItemAjax(){
   	 return view('posts.manage_item');
   }
   public function itemInsertPost(Request $request){
     if($request->ajax()){
     	
     	return response(Item::create($request->all()));
     }
   }
}
