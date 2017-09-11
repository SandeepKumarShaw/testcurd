<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use Image;

class FileController extends Controller
{
    public function getResizeImage(){
        return view('files.resizeimage');
    }
    public function postResizeImage(Request $request){
        $photo = Input::file('photo')->getClientOriginalName(); 
        $src_photo = Input::file('photo');
        $src_photo->move('images/', $photo);
        $img_path   = public_path().'/images/'.$photo;
        $medium_dir1 = public_path().'/images/normal_images/'.$photo;
        $medium_dir2 = public_path().'/images/thumbnail_images/'.$photo;
        
        // create instance
        $img = Image::make($img_path);

        // resize the image to a width of 300 and constrain aspect ratio (auto height)
        $img->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($medium_dir1);

        // resize the image to a height of 200 and constrain aspect ratio (auto width)
        $img->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($medium_dir2);

        return back()->with('success','Image Upload successful')->with('photo',$photo);
    }    
}
