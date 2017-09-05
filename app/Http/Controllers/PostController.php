<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
class PostController extends Controller{
    public function index(Request $request){
      //$posts = Post::all();
      $posts = DB::table('posts')->paginate(4);
    	return view('posts.index',compact('posts'))->with('i', ($request->input('page', 1) - 1) * 4);
    }
    public function create(){
        return view('posts.create');
    }
    public function store(Request $request){
       $this->validate($request, [
        'title' => 'required|unique:posts|max:25',
        'content' => 'required',
        'image_file' => 'required',
       ]);      
        

        $image = $request->file('image_file');
        $input['image_file'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['image_file']);        
        $input['title'] = $request->title;
        $input['content'] = $request->content;
           


       //Post::create($request->all());
        Post::create($input);
       return redirect()->route('index')->with('success','Post created successfully');                  
    }
    public function destroy($id){
          Post::find($id)->delete();
          //Session::flash('success','Post deleted successfully!');
          return redirect()->route('index')->with('success','Post deleted successfully');
    }
    public function show($id){
      $post = Post::find($id);
      return view('posts.show',compact('post'));
    }
    public function edit($id){
      $post = Post::find($id);
      return view('posts.edit',compact('post'));
    }
    public function update(Request $request,$id){
      $this->validate($request, [
        'title' => 'required|max:25',
        'content' => 'required',
       ]);
       if($request->hasFile('image_file')){
        $image = $request->file('image_file');
        $input['image_file'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['image_file']);
        }        
        $input['title'] = $request->title;
        $input['content'] = $request->content;

        // Post::find($id)->update($request->all());
        Post::find($id)->update($input);
      return redirect()->route('index')->with('success','Post Updated successfully');
 
    }
}
