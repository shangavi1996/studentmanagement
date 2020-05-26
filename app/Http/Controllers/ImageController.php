<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
class ImageController extends Controller
{
  
    public function displayImage($id,$filename)
    {
        $f_path = storage_path().'/teachers/' . $id.'/'.$filename;
        return Image::make($f_path)->response();
    }

    public function displaystudentsImage($id,$filename)
    {
        $f_path = storage_path().'/students/' . $id.'/'.$filename;
        return Image::make($f_path)->response();
    }

    public function displayuser()
    {
        $f_path = storage_path().'/user/user.png';
        return Image::make($f_path)->response();
    }
}
