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

     	$image = $request->file('photo');
        $input['photo'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['photo']);        
        $input['title'] = $request->title;
        $input['description'] = $request->description;
     	  /*$response = array(
            'status' => 'success',
            'msg' => 'Item created successfully',
        );*/
     	//return response(Item::create($request->all()));

     	return response(Item::create($input));
     }
   }
}
