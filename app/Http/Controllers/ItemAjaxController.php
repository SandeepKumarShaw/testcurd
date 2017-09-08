<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use DB;
use File;
class ItemAjaxController extends Controller{
   public function manageItemAjax(Request $request){
     $result = DB::table('items')->paginate(4);
   	 return view('posts.manage_item',compact('result'))->with('i', ($request->input('page', 1) - 1) * 4);
   }
   public function itemInsertPost(Request $request){
     if($request->ajax()){
     	$image = $request->file('photo');
        $input['photo'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['photo']);        
        $input['title'] = $request->title;
        $input['description'] = $request->description;
     	  $response = array(
            'status' => 'success',
            'msg' => 'Item created successfully',
        );
     	//return response(Item::create($request->all()));
      Item::create($input);
     	return \Response::json($response);
     }
   }
   public function itemEditPost(Request $request){
   
     if ($request->ajax()){
       $displayItem = Item::find($request->id);
      // return \Response::json($displayItem); 
       return response()->json($displayItem); 
     }
   }
  public function itemUpdatePost(Request $request,$id){   
          //$data = Item::all();
          if($request->hasFile('photo')){            
              $item = Item::find($request->id);
              
              $input['title'] = $request->title;
              $input['description'] = $request->description;

              $image = $request->file('photo');

              $input['photo'] = time().'.'.$image->getClientOriginalExtension();
              $destinationPath = public_path('/images');
              //File::delete($destinationPath, $item->photo);
              File::delete('images/' . $item->photo);
              $image->move($destinationPath, $input['photo']);        
              $input['title'] = $request->title;
              $input['description'] = $request->description;
              $response = array(
                  'status' => 'success',
                  'msg' => 'Item updated successfully',
              );
            Item::find($request->id)->update($input);
            return \Response::json($response);
          }
  }
   
}
