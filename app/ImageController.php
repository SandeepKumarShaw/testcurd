<?php

namespace App;
use Storage;
use File;
use Illuminate\Database\Eloquent\Model;

class ImageController extends Model
{
    public static function photo($request, $fileName){
       $photo = $request->image;
       $extension = time().'.'.$photo->getClientOriginalExtension();
       Storage::disk('photo')->put($extension,File::get($photo));
       return $extension;
    }
}
