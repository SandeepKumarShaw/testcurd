<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\StaffItem;
use App\Staff;
use App\Borrower;
use App\BorrowerItem;


class StaffController extends Controller
{   public function __construct(){
    	$this->middleware('web');
    }
    public function staff(){
        $items = StaffItem::paginate(10);
        return view('staff.main',compact('items'));
    }
    public function logout(){
    	Auth::logout();
    	//Session::flush();
    	return redirect()->route('index');
    }
    public function add_item(Request $request){
     $this->validate($request,[
        'name' => 'required|max:30',
        'quantity' => 'required|max:5']);
     $user = User::find(Auth::id());
     $staffitem = new StaffItem;
     $staffitem->name     = $request['name'];
     $staffitem->quantity = $request['quantity'];
     //$staffitem->user_id = Auth::id();
     //$staffitem->save();
     //return redirect()->back()->with('item', 'You have successfully added new item');
     $user->item()->save($staffitem);
        return redirect()->back()->with('item', 'You have successfully added new item');
     
    }
}
