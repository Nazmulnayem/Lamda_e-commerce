<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slideImage;
use Image;
class slideImageController extends Controller
{
    public function index(){
        return view('admin.SlideBar.AddSlidebarImage');
    }
    protected function ImageValidation($request){
        $this->validate($request,[

            'slide_image'=>'required | image',

        ]);
    }
    protected function Imageupload($request){
        $slideImage   =  $request->file('slide_image');
        $fileType = $slideImage->getClientOriginalExtension();
        $ImageName = 'slideimage'.rand(1,20).'.'.$fileType;
        $directory = 'product-image/';
        $ImageUrl = $directory.$ImageName;
        //$productImage->move($directory,$ImageName);
        Image::make($slideImage)->save($ImageUrl);
        return $ImageUrl;
    }
    protected function slideimageSave($ImageUrl){
        $slideimage   = new slideImage();
        $slideimage->slide_image= $ImageUrl;
        $slideimage->save();

    }

    public function saveImage(Request $request){
        $this->ImageValidation($request);
        $ImageUrl = $this->Imageupload($request);
        $this->slideimageSave($ImageUrl);


        return redirect('add-slidebar')->with('massage','image save successfully');

    }
}
