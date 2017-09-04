<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function index(){
    	return view('posts.index');
    }
    public function create(){

        return view('posts.create');
    }
    public function show(Request $reuest){
     /*  $this->validate($request, [
        'title' => 'required|unique:posts|max:255',
        'content' => 'required',
       ]);
       Post::create($request->all());
       return redirect()->route('posts.index')

                        ->with('success','Post created successfully');*/
       echo "dghsghgsdhg";                 
    }
}
