<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{   public function __construct(){
    	$this->middleware('web');
    }
    public function staff(){
        
        return view('staff.main');
    }
    public function logout(){
    	Auth::logout();
    	//Session::flush();
    	return redirect()->route('index');
    }
}
