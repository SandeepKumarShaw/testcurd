<?php

namespace App\Http\Controllers;
use Storage;
use File;
use App\ImageController;
use Illuminate\Http\Request;

class ImageControllerController extends Controller
{
    public function imageUpload(){
        return view('files.image-upload');
    }
    public function imageUploadSuc(Request $request){
        $st = new ImageController;
        $st->image = ImageController::photo($request,'image');
        if($st->save()){
            return back()->with('msg','Insert Success');
        }
    }

    
}
