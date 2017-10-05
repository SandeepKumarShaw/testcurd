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
        $items = StaffItem::paginate(2);
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
    public function staff_borrow($staffitem_id){
        $find_item = StaffItem::find($staffitem_id);
        if(!$find_item){
            abort(404);
        }

        return view('staff.borrow', compact('find_item'));
    }
    public function borrow_item(Request $request, $staffitem_id){
        $this->validate($request, [
            'lname' => 'required|max:15',
            'fname' => 'required|max:15',
            'mname' => 'required|max:15',
            'quantity'=> 'required|max:4'
        ]);
        $borrower = new Borrower;
        $borrower->lname = $request['lname'];
        $borrower->fname = $request['fname'];
        $borrower->mname = $request['mname'];
        $borrower->save();

        $find_borrower = Borrower::find($borrower->id);
        $borrower_item = new BorrowerItem;
        $borrower_item->staffitem_id = $staffitem_id;
        $borrower_item->quantity = $request['quantity'];
        $borrower_item->status = 0;
        $find_borrower->borrower_item()->save($borrower_item);

        $item = StaffItem::find($staffitem_id);
        $item->quantity = $item->quantity - $request['quantity'];
        StaffItem::where('id',$staffitem_id)->update(['quantity'=> $item->quantity]);

        return redirect()->route('staff')->with('borrow', 'You have borrwed successfully');


    }
    public function view_borrowed_item($staffitem_id){
        $find_item = StaffItem::find($staffitem_id);
        $borrowers = BorrowerItem::distinct('borrower_id')->where('staffitem_id', $staffitem_id)->where('status', 0)->get();
        return view('staff.view_borrowed',compact('find_item', 'borrowers'));
    }
    public function staff_return($staffitem_id, $borrowed_id){
        $item = StaffItem::find($staffitem_id);
        BorrowerItem::where('id',$borrowed_id)->where('status', 0)->update(['status'=> 1]);
        $borrower_item = BorrowerItem::find($borrowed_id);
        $quantity = $item->quantity + $borrower_item->quantity;
        StaffItem::where('id', $staffitem_id)->update(['quantity'=> $quantity]);
        return redirect()->back()->with('quantity', 'Item has been return successfully');
    }
}
