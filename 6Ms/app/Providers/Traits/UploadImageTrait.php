<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait ImageUploadImageTrait
{
    public function UploadImage(Request $request,$folderName)
    {
        $image =$request ->file('image')->getClientOriginalName();
        $path =$request ->file('image')->storeAs($folderName,$image,'merna');
        return $path;
    }

}
