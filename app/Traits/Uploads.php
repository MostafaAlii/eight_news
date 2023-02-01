<?php
namespace App\Traits;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait Uploads {
    public function verifyAndStoreImage(Request $request, $inputname, $foldername, $disk, $imageable_id, $imageable_type) {
        $DS = DIRECTORY_SEPARATOR;
        if ($request->hasFile($inputname)) {
            // Check if the file is present or not
            if (!$request->file($inputname)->isValid()) 
                return redirect()->back()->with('error', 'هناك خظأ في الصورة');  
            // check the folder exists or not
            if (!file_exists(public_path('uploads' . $DS . $foldername))) 
                mkdir(public_path('uploads' . $DS . $foldername), 0777, true);
            $photo = $request->file($inputname);
            $name = $photo->hashName();
            $filename = $name;
            //Insert Img
            $image = new Image();
            $image->filename = $filename;
            $image->imageable_id = $imageable_id;
            $image->imageable_type = 'App\Models' . $DS . $imageable_type;
            $image->save();
            // Store the image
            return $request->file($inputname)->storeAs($foldername, $filename, $disk);
        }
        return null;
    }
}