<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function main(){
    	return view('auth.login');
    }
    public function login(){
    	//return view('auth.login');
    }
}
