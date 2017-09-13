<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use Image;
use App\Photo;
class FileController extends Controller
{
    public function getResizeImage(){
        //$results = Photo::all();

        $results = Photo::paginate(2);
       
        return view('files.resizeimage', compact('results'));

    }
    public function thumbcreate(){
        return view('files.thumgenerate');
    }
    public function postResizeImage(Request $request){     
        $this->validate($request, ['photo' => 'required']);   
        $image = $request->file('photo');
        $input['photo'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['photo']); 

        $img_path   = public_path().'/images/'.$input['photo'];
        $medium_dir1 = public_path().'/images/normal_images/'.$input['photo'];
        $medium_dir2 = public_path().'/images/thumbnail_images/'.$input['photo'];
        
        // create instance
        $img = Image::make($img_path);

        // resize the image to a width of 100 and constrain aspect ratio (auto height)
        $img->resize(100, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($medium_dir1);

        // resize the image to a height of 200 and constrain aspect ratio (auto width)
        $img->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($medium_dir2);

        Photo::create($input);
        return redirect()->route('intervention.getresizeimage')->with('success','Image Upload successful');      
    }
    public function postViewImage($id){
         $result = Photo::find($id);
         return view('files.resizeimageview',compact('result'));
    }
     
}
