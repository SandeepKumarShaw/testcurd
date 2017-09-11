<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use Image;

class FileController extends Controller
{
       public function getResizeImage()
    {
        return view('files.resizeimage');
    }
   /* public function postResizeImage(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
        $photo = $request->file('photo');
        $imagename = time().'.'.$photo->getClientOriginalExtension(); 
   
        $destinationPath = public_path('/images/thumbnail_images');
        $thumb_img = Image::make($photo->getRealPath())->resize(100, 100);
        $thumb_img->save($destinationPath.'/'.$imagename,80);
                    
        $destinationPath = public_path('/images/normal_images');
        $photo->move($destinationPath, $imagename);
        return back()
            ->with('success','Image Upload successful')
            ->with('imagename',$imagename);
    }*/
    public function postResizeImage(Request $request){
        $photo = Input::file('photo')->getClientOriginalName();
 
$src_photo = Input::file('photo');
                                        
$src_photo->move('images/', $photo);
    
$img_path   = public_path().'/images/'.$photo;

// make medium size image (200px x 300px)  
$medium_dir = public_path().'/images/normal_images/'.$photo;
 
Image::make($img_path)->resize(200, 300, function($c) {
                    $c->aspectRatio();
                    $c->upsize();
                })->save($medium_dir);

// want to create fix size image with white background
Image::make($medium_dir)->resizeCanvas(200, 300, 'center', false, array(255, 255, 255, 0))->save($medium_dir);  

// make small size image (100px x 100px)  
$thumb_dir = public_path().'/images/thumbnail_images/'.$photo; 
Image::make($img_path)->resize(100, 100, function($c) {
                    $c->aspectRatio();
                    $c->upsize();
                })->save($thumb_dir);

// want to create fix size image with white background
Image::make($medium_dir)->resizeCanvas(100, 100, 'center', false, array(255, 255, 255, 0))->save($thumb_dir); 
return back()
            ->with('success','Image Upload successful')
            ->with('photo',$photo);
    }

    
}
